// iniciamos GoogleAnalytics (Lumos & Comdetur)
_.ga.init('UA-72795483-1');
_.ga.init('UA-40691960-1');
// declaramos la instancia
this.Lumos = this.Lumos || {};
// metodos genericos
(function($this) {
    // preinit de la app
    $this.preInit = function() {
        // redactor
        _redactor();
        // class para el nav
        $('.article-section').scroll(_scroll);
        _scroll();
        // pickmeup
        _pickmeup();
        // autocomplete
        _autocomplete();
        // search
        _searchs();
        // filter
        _filters();
        // verificamos si hay init
        if (Lumos !== undefined && typeof Lumos.init === 'function')
            // ejecutamos el init
            Lumos.init();
        // eliminamos el metodo
        delete $this.preInit;
    };
    var _redactor = function() {
        // habilitamos redactor.js
        $('.redactor-editor').redactor({
            buttons: [
            'formatting', 'bold', 'italic', '|', 'unorderedlist', 'orderedlist', 'video'
            ]
        });
    };
    var _scroll = function() {
        if ($('.article-section').scrollTop() > 1)
            $('#topnav').addClass('scroll');
        else
            $('#topnav').removeClass('scroll');
    };
    var _pickmeup = function() {
        // fecha
        $('input[data-pmu-format]').pickmeup({
            locale: {
            days: [
            'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'
            ],
            daysShort: [
            'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom'
            ],
            daysMin: [
            'Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa', 'Do'
            ],
            months: [
            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
            ],
            monthsShort: [
            'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
            ]
            }
        });
        // FIX: calendar clicks
        $('input[data-pmu-format]').keyup(function(e) {
            if (e.keyCode == 9)
                $(this).click();
        });
    };
    var _autocomplete = function() {
        $('#vuelos .airport').each(function() {
            var $self = $(this);
            $self.autocomplete({
                source: function(request, callback) {
                    _.module('proxy', {
                        url: 'http://www.viajeselcorteingles.es/transporte/autocompletado/find?name=' + request.term + '&capability=AIR&language=es&limit=10'
                    }, function(data) {
                        // procesamos los datos
                        callback(_processAirports(data));
                    });
                }
            })
        });
        $('#hoteles .destiny').each(function() {
            var $self = $(this);
            $self.autocomplete({
                source: function(request, callback) {
                    _.module('proxy', {
                        url: 'http://www.viajeselcorteingles.es/hotel/autocompletado/ESP/es/' + request.term + '/CITY/10'
                    }, function(data) {
                        // procesamos los datos
                        callback(_processCities(data));
                    });
                }
            })
        });
    };
    var _searchs = function() {
        $('#search-flights').click(function() {
            var $id = $('#vuelos li[role="presentation"].active input[name="rb"]').val();
            _searchFlights($id);
        });
        $('#search-hotels').click(function() {
            _searchHotels();
        });
    };
    var _filters = function() {
        return;
        $("#filter_precio").flatslider({
        min: $("#filter_precio").val().split(';')[0],
        max: $("#filter_precio").val().split(';')[1].split(':')[0],
        step: $("#filter_precio").val().split(':')[1],
        values: [
        $("#filter_precio").val().split(';')[0], $("#filter_precio").val().split(';')[1].split(':')[0]
        ],
        range: true,
        einheit: 'U$D'
        });
    };
    var _processAirports = function(data) {
        var $airports = [];
        // recorremos las ciudades
        for ( var city in data) {
            // obtenemos la ciudad
            var $city = data[city];
            // recorremos los aeropuertos de la ciudad
            for ( var airport in $city.children) {
                // obtenemos el aeropuerto
                var $airport = $city.children[airport];
                // agregamos el aeropuerto
                $airports[$airports.length] = $city.name + ' - ' + $city.country + ', ' + $airport.name + ' [' + $airport.iata + ']';
            }
        }
        return $airports;
    };
    var _processCities = function(data) {
        var $cities = [];
        // recorremos las ciudades
        for ( var city in data.CITY) {
            // obtenemos la ciudad
            var $city = data.CITY[city];
            // agregamos la ciudad
            $cities[$cities.length] = {
            label: $city.hierarchyName,
            value: $city.name
            };
        }
        return $cities;
    };
    var _searchFlights = function(id) {
        if ($('#form-vuelos-' + id + ' #B_DATE_1_send')[0] !== undefined)
            $('#form-vuelos-' + id + ' #B_DATE_1_send').val($('#form-vuelos-' + id + ' #B_DATE_1').val().replace(/\//gi, ''));
        if ($('#form-vuelos-' + id + ' #B_DATE_2_send')[0] !== undefined)
            $('#form-vuelos-' + id + ' #B_DATE_2_send').val($('#form-vuelos-' + id + ' #B_DATE_2').val().replace(/\//gi, ''));
        if ($('#form-vuelos-' + id + ' #B_DATE1Cpx_send')[0] !== undefined)
            $('#form-vuelos-' + id + ' #B_DATE1Cpx_send').val($('#form-vuelos-' + id + ' #B_DATE1Cpx').val().replace(/\//gi, ''));
        if ($('#form-vuelos-' + id + ' #B_DATE2Cpx_send')[0] !== undefined)
            $('#form-vuelos-' + id + ' #B_DATE2Cpx_send').val($('#form-vuelos-' + id + ' #B_DATE2Cpx').val().replace(/\//gi, ''));
        if ($('#form-vuelos-' + id + ' #B_DATE2Cpx_send')[0] !== undefined)
            $('#form-vuelos-' + id + ' #B_DATE3Cpx_send').val($('#form-vuelos-' + id + ' #B_DATE3Cpx').val().replace(/\//gi, ''));
        $('#form-vuelos-' + id).submit();
    };
    var _searchHotels = function(id) {
        if ($('#form-hotels #B_DATE_1_send')[0] !== undefined)
            $('#form-hotels #B_DATE_1_send').val($('#form-hotels #B_DATE_1').val().replace(/\//gi, ''));
        if ($('#form-hotels #B_DATE_2_send')[0] !== undefined)
            $('#form-hotels #B_DATE_2_send').val($('#form-hotels #B_DATE_2').val().replace(/\//gi, ''));
        $('#form-hotels').submit();
    };
}(Lumos));
// ejecutamos el proceso de la pagina
$(Lumos.preInit);
(function() {
    [
    'images/iconos/sprite.svg', 'images/iconos/docs.svg'
    ].forEach(function(u) {
        var x = new XMLHttpRequest(), b = document.body;
        if ('withCredentials' in x)
            x.open('GET', u, true);
        else if (typeof XDomainRequest == 'function') {
            x = new XDomainRequest();
            x.open('GET', u);
        } else
            return;
        // Inject hidden div with sprite on load
        x.onload = function() {
            var c = document.createElement('div');
            c.setAttribute('hidden', '');
            c.innerHTML = x.responseText;
            b.insertBefore(c, b.childNodes[0]);
        }
        // Timeout for IE9
        setTimeout(function() {
            x.send();
        }, 0);
    });
})();
