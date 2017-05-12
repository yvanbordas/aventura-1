(function($this) {
    var $package_id = $_GET['pid'];
    var $background = null;
    var $thumbnail = null;
    var $sizes = [];
    var $pricetables = [];
    var $uploaded = false;
    $this.init = function() {
        // Autocomplete
        $('#country-city,#continent,#category').each(_autocomplete);
        // price tables
        _prices();
        // imagenes
        _images();
        // categorias
        _categories();
        // save
        $('#save').click(_save);
        // delete
        $('#delete').click(_delete);
    };
    var _images = function() {
        _sizes();
        $background = $('#background-img').croppie({
        viewport: {
        width: $sizes[0],
        height: $sizes[1]
        },
        boundary: {
        width: $sizes[0],
        height: $sizes[1]
        }
        });
        // verificamos si hay imagen
        if ($('#background-img').attr('background') !== undefined)
            $background.croppie('bind', {
                url: 'modules/upload/cache/' + $('#background-img').attr('background')
            });
        $thumbnail = $('#thumbnail-img').croppie({
        viewport: {
        width: 300,
        height: 300
        },
        boundary: {
        width: 350,
        height: 350
        }
        });
        // verificamos si hay imagen
        if ($('#thumbnail-img').attr('thumbnail') !== undefined)
            $thumbnail.croppie('bind', {
            url: 'modules/upload/cache/' + $('#thumbnail-img').attr('thumbnail'),
            points: [
            0, 0, 300, 300
            ]
            });
        $('#upload-img').change(function() {
            $uploaded = false;
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $background.croppie('bind', {
                        url: e.target.result
                    });
                    $thumbnail.croppie('bind', {
                        url: e.target.result
                    });
                    $uploaded = true;
                }
                reader.readAsDataURL(this.files[0]);
            } else
                _.alert("Sorry - you're browser doesn't support the FileReader API");
        });
        $('#background-upload').click(function() {
            $('#upload-img').click();
        });
    };
    var _categories = function() {
        $('.categories-wrapper').on('keyup', '.form-group>input', function() {
            if ($(this).val().length == 0 && $(this).prop('edited') == true)
                $(this).parent().remove();
            else if ($(this).val().length > 0)
                $(this).prop('edited', true);
        });
        $('.categories-wrapper').on('keyup', '.form-group:last-child>input', function() {
            if ($(this).val().length > 0) {
                var $append = $('<div class="form-group"><input type="text" placeholder="Categoria" class="form-control"/></div>');
                $append.find('input').autocomplete({
                source: 'module/autocomplete?s=category',
                delay: 50
                });
                $('.categories-wrapper').append($append);
            }
        });
    };
    var _autocomplete = function() {
        $(this).autocomplete({
        source: 'module/autocomplete?s=' + $(this).attr('id'),
        delay: 50
        });
    };
    var _prices = function() {
        // add new price tables button
        $('#add-table').click(_addPricesTable);
        // recorremos las tablas actuales
        $('.prices-table-wrapper .prices-table').each(function() {
            // habilitamos la tabla
            $pricetables[$pricetables.length] = $(this).editTable();
        });
        // recorremos los botones eliminar
        $('.prices-table-wrapper #delete').each(function() {
            var $self = $(this);
            // seteamos el evento
            $self.click(function() {
                $self.parent().parent().remove();
                delete $pricetables[$self.attr('table')];
            });
        });
    };
    var _addPricesTable = function() {
        var $self = $(this);
        var $container = $('<div class="form-group"><textarea class="form-control hidden prices-table"></textarea><div class="bt-style"><a href="#" id="delete" table="' + $pricetables.length + '"><span data-hover="Eliminar">Eliminar</span></a></div></div>');
        $container.find('#delete').click(function() {
            $container.remove();
            delete $pricetables[$(this).attr('table')];
        });
        $pricetables[$pricetables.length] = $container.find('.prices-table').editTable();
        $self.before($container);
    };
    var _sizes = function() {
        $sizes[0] = $('#background-img').width();
        $sizes[1] = $('#background-img').height();
    };
    var _save = function() {
        // verificamos los datos
        if (!$uploaded) {
            _.alert('Por favor, seleccione la imagen para el paquete');
            return false;
        }
        // guardamos los datos
        _.lock('Guardando.<br/>Por favor, espere.');
        $background.croppie('result', {
        type: 'canvas',
        size: 'viewport'
        }).then(function(md5_background) {
            _.module('image', {
                image: md5_background
            }, function(data_background) {
                $thumbnail.croppie('result', {
                type: 'canvas',
                size: 'viewport'
                }).then(function(md5_thumbnail) {
                    _.module('image', {
                        image: md5_thumbnail
                    }, function(data_thumbnail) {
                        // obtenemos las categorias
                        var $categories = [];
                        $('.categories-wrapper input').each(function() {
                            if ($(this).val().length > 0)
                                $categories[$categories.length] = $(this).val();
                        });
                        // obtenemos las tablas de precios
                        var $prices = [];
                        for ( var table in $pricetables)
                            $prices[$prices.length] = JSON.parse($pricetables[table].getJsonData());
                        // guardamos el paquete
                        _.module('packages', {
                        s: 'save',
                        package: $package_id,
                        title: $('#title').val(),
                        continent: $('#continent').val(),
                        country_city: $('#country-city').val(),
                        price: $('#price').val(),
                        international: $('#international').prop('checked'),
                        background: data_background.image,
                        thumbnail: data_thumbnail.image,
                        details: $('#details').redactor().getCode(),
                        important: $('#important').prop('checked'),
                        categories: $categories,
                        prices: $prices
                        }, function(data) {
                            if (!data.success) {
                                _.lock(null);
                                _.alert(data.message, _.unlock);
                                return;
                            }
                            // pasamos a la pantalla del paquete
                            _.screen('sc-package?pid=' + data.package);
                        });
                    });
                });
            });
        });
    };
    var _delete = function() {
        _.lock();
        _.confirm('Esta seguro de eliminar este paquete?', function(r) {
            if (!r) {
                _.unlock();
                return;
            }
            _.module('packages', {
            s: 'delete',
            package: $package_id
            }, function(data) {
                if (!data.success) {
                    _.lock(null);
                    _.alert(data.message, _.unlock);
                    return;
                }
                // volvemos a la lista de paquetes
                _.screen('sc-paquetes');
            });
        });
    };
}(Lumos));