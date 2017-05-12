/**
 * WholeAuth SDK - Effects module
 * <p>
 * Copyrigth 2014 - HDS Solutions
 * </p>
 */
(function($, _, undefined) {
    // registramos el modulo
    var $this = _.registerModule('fx', '0.1.15', true);
    // plugins del modulo
    var $plugins = {};
    $this.init = function() {
        // recorremos los plugins
        for ( var $i in $plugins) {
            // publicamos el plugin
            $this[$i] = $plugins[$i].fn;
            $this[$i].version = $plugins[$i].version;
            // ejecutamos el init del plugin
            $plugins[$i].init();
            // eliminamos el metodo
            delete $plugins[$i].init;
        }
    };
    // metodo para registrar los plugins
    var registerPlugin = function(name, version, auto) {
        // mostramos un mensaje en consola
        _.log('[WholeAuth:FX] Registering plugin ' + name + ' v' + version);
        // registramos el plugin
        $plugins[name] = {};
        $plugins[name].version = version;
        $plugins[name].fn = function() {};
        // datos privados
        $plugins[name].elements = [];
        $plugins[name].priv = {};
        $plugins[name].init = function() {};
        // si tiene evento auto o no
        $plugins[name].auto = auto | false;
        // retornamos el namespace del plugin
        return $plugins[name];
    };
    /**
     * AutoScroll
     * 
     * @author Hermann D. Schimpf
     * @param element Selector jQuery
     * @param orientation Orientacion, default 'vertical'
     */
    var $autoScroll = registerPlugin('autoScroll', '1.1');
    $autoScroll.fn = function(element, orientation) {
        // valor por defecto
        if (orientation === undefined)
            // por defecto es vertical
            orientation = 'vertical';
        // agregamos el elemento
        $autoScroll.elements[element] = {};
        var $element = $autoScroll.elements[element];
        $element.id = element;
        $element.orientation = orientation;
        $element.margin = $(element).css('margin-left');
        $element.mousePos = 0;
        $element.timeout = null;
        $element.interval = null;
        // añadimos el evento en el elemento
        $(element).parent().mousemove(function(e) {
            // almacenamos la posicion del mouse
            $element.mousePos = e.clientX;
        });
        // añadimos los eventos mouseover mouseout
        $(element).parent().mouseover(function() {
            // cancelamos el timeout
            clearTimeout($element.timeout);
            // verificamos si hay interval
            if ($element.interval !== null)
                return;
            // generamos el interval
            $element.interval = setInterval(function() {
                // calculamos la parte oculta
                var $visible = $(element).parent().width();
                var $toMove = $(element).width() - $visible;
                // verificamos si es totalmente visible
                if ($visible > $(element).width()) {
                    // centramos el elemento
                    $(element).css({
                        'margin-left': -($toMove / 2) + 'px'
                    });
                    return;
                }
                // calculamos la posicion del mouse
                var $pos = $element.mousePos - $(element).parent().offset().left;
                var $percent = 100 / $visible * $pos;
                // direfencia
                var $diff = ($toMove / 100 * $percent * -1) - parseInt($(element).css('margin-left'));
                // destino
                var $dest = parseInt($(element).css('margin-left')) - $diff * .1 * -1;
                // movemos el elemento
                $(element).css({
                    'margin-left': ($dest) + 'px'
                });
            }, 25);
        });
        $(element).parent().mouseout(function() {
            // seteamos el timeout
            $element.timeout = setTimeout(function() {
                // cancelamos el interval
                clearInterval($element.interval);
                $element.interval = null;
            }, 2000);
        });
    };
    $autoScroll.init = function() {
        // seteamos los eventos
        $(window).resize($autoScroll.priv.onResize);
        $($autoScroll.priv.onResize);
    };
    $autoScroll.priv.onResize = function() {
        // recorremos los elementos
        for ( var i in $autoScroll.elements) {
            // obtenemos el elemento
            var $element = $autoScroll.elements[i];
            var $visible = $($element.id).parent().width();
            var $toMove = $($element.id).width() - $visible;
            // centramos el elemento
            $($element.id).css({
                'margin-left': -($toMove / 2) + 'px'
            });
        }
    };
    /**
     * RowHeight
     */
    var $rowHeight = registerPlugin('rowHeight', '1.1');
    $rowHeight.fn = function(container) {
        // agregamos el elemento
        $rowHeight.elements[container] = {};
        var $element = $rowHeight.elements[container];
        // almacenamos el id
        $element.id = container;
    };
    $rowHeight.init = function() {
        // seteamos los eventos
        $(window).resize($rowHeight.priv.onResize);
        $($rowHeight.priv.onResize);
    };
    $rowHeight.priv.onResize = function() {
        // recorremos los elementos
        for ( var i in $rowHeight.elements) {
            // obtenemos el elemento
            var $element = $rowHeight.elements[i];
            //
            var currentTallest = 0, currentRowStart = 0, rowDivs = new Array(), $el, topPosition = 0;
            $($element.id).each(function() {
                $el = $(this);
                $($el).height('auto')
                topPostion = $el.position().top;
                if (currentRowStart != topPostion) {
                    for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++)
                        rowDivs[currentDiv].height(currentTallest);
                    // empty the array
                    rowDivs.length = 0;
                    currentRowStart = topPostion;
                    currentTallest = $el.height();
                    rowDivs.push($el);
                } else {
                    rowDivs.push($el);
                    currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
                }
                for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++)
                    rowDivs[currentDiv].height(currentTallest);
            });
        }
    };
    /**
     * Dynamic Fixed
     * 
     * @param element jQuery selector
     * @param options Opciones<br>
     *        start: Posicion de inicio donde se bloquea la posicion del elemento<br>
     *        end: Posicion final del elemento<br>
     *        smooth: Rango del effecto smooth
     */
    var $dynamicFixed = registerPlugin('dynamicFixed', '1.3');
    $dynamicFixed.fn = function(element, start, end, smooth) {
        // agregamos el elemento
        $dynamicFixed.elements[element] = {};
        var $element = $dynamicFixed.elements[element];
        $element.element = $(element);
        $element.start = start | 0;
        $element.end = end | 0;
        $element.smooth = smooth | 0;
        $element.oMargin = $(element).css('margin-top');
    };
    $dynamicFixed.init = function() {
        // seteamos los eventos
        $(window).scroll($dynamicFixed.priv.onScroll);
    };
    $dynamicFixed.priv.onScroll = function() {
        // recorremos los elementos
        for ( var i in $dynamicFixed.elements) {
            // obtenemos el elemento
            var $element = $dynamicFixed.elements[i];
            // posicion del elemento
            var $margin = $element.oMargin;
            // verificamos si estamos en el rango del efecto
            if ($(window).scrollTop() > $element.start - $element.smooth)
                // verificamos si hacemos el efecto normal
                if ($(window).scrollTop() > $element.start) {
                    // verificamos estamos en el rango del efecto
                    if ($(window).scrollTop() < $element.end)
                        // la posicion es dinamica con el scroll - el inicio + el espacio del smooth
                        $margin = $(window).scrollTop() - $element.start + $element.smooth / 2;
                    else
                        // termino el efecto, la posicion queda fija
                        $margin = $element.end - $element.start + $element.smooth / 2;
                } else {
                    // calculamos el porcentaje de la posicion del smooth
                    $percent = 100 / $element.smooth * ($element.start - $element.smooth - $(window).scrollTop()) * -1;
                    $percent = $percent / 100 * $percent / 2;
                    // calculamos el efecto smooth
                    $margin = $element.smooth / 100 * $percent;
                }
            // asignamos la posicion del elemento
            $element.element.css('margin-top', $margin);
        }
    };
    /**
     * FadeScroll
     */
    var $fadeScroll = registerPlugin('fadeScroll', '1.0');
    $fadeScroll.fn = function(element, property, start, end, max) {
        // agregamos el elemento
        $fadeScroll.elements[element] = {};
        // pointer (for minimized size optimizing)
        var $element = $fadeScroll.elements[element];
        $element.element = $(element);
        $element.property = property;
        $element.start = start;
        $element.end = end;
        $element.max = max | end;
    };
    $fadeScroll.init = function() {
        // seteamos los eventos
        $(window).scroll($fadeScroll.priv.onScroll);
        $($fadeScroll.priv.onScroll);
    };
    $fadeScroll.priv.onScroll = function() {
        // recorremos los elementos
        for ( var i in $fadeScroll.elements) {
            // obtenemos el elemento
            var $element = $fadeScroll.elements[i];
            // calculamos el tamaño en porcentaje
            var $size = 100 / $element.end * ($(window).scrollTop() < $element.start ? 0 : ($(window).scrollTop() > $element.start + $element.max ? $element.max : $(window).scrollTop() - $element.start));
            // verificamos que tipo de efecto es
            if ($element.property === 'opacity')
                $element.element.css('opacity', $size / 100);
            if ($element.property === 'left')
                $element.element.css('width', $size + '%');
            if ($element.property === 'top')
                $element.element.css('height', $size + '%');
            if ($element.property === 'right') {
                $element.element.css('left', (100 - $size) + '%');
                $element.element.css('width', $size + '%');
            }
            if ($element.property === 'bottom') {
                $element.element.css('top', -$size + '%');
                $element.element.css('height', $size + '%');
            }
        }
    };
    /**
     * Fill
     */
    var $fill = registerPlugin('fill', '1.1');
    $fill.fn = function(element, source, aspect_ratio) {
        // capturamos el cambio de tamaño del elemento
        $(source).resize(function() {
            // obtenemos el aspect rati actual
            $dAspect = $(source).width() / $(source).height();
            if (aspect_ratio > $dAspect) {
                $temp_height = $(source).height();
                $temp_width = parseInt($(source).height() * aspect_ratio);
            } else {
                $temp_width = $(source).width();
                $temp_height = parseInt($(source).width() / aspect_ratio);
            }
            // seteamos la posicion y tamaño de la imagen
            $(element).find('img').css({
            width: $temp_width,
            height: $temp_height,
            'margin-left': (($(source).width() - $temp_width) / 2) + 'px',
            'margin-top': (($(source).height() - $temp_height) / 2) + 'px'
            });
            // ejecutamos la primera vez
        }).trigger('resize');
    };
    /**
     * Parallax
     */
    var $parallax = registerPlugin('parallax', '1.2');
    $parallax.fn = function(element, x, y) {
        // agregamos el elemento
        $parallax.elements[element] = {};
        // pointer (for minimized size optimizing)
        var $element = $parallax.elements[element];
        $element.id = element;
        // posiciones originales del elemento
        $element.left = $(element).position().left;
        $element.top = $(element).position().top;
        $element.x = x;
        $element.y = y;
        $element.parent = $(element).parent();
        $element.width = $(element).parent().width();
    };
    $parallax.init = function() {
        // seteamos los eventos
        $(window).mousemove($parallax.priv.onMouseMove);
        setInterval($parallax.priv.onParallax, 15);
    };
    $parallax.priv.moveX = 0;
    $parallax.priv.moveY = 0;
    $parallax.priv.onMouseMove = function(e) {
        var $width = parseInt($(window).width()) / 2;
        var $height = parseInt($(window).height()) / 2;
        // calculamos el movimiento
        $parallax.priv.moveX = Math.round(100 / $width * (e.pageX - $width)) * -1;
        $parallax.priv.moveY = Math.round(100 / $height * (e.pageY - $height)) * -1;
    };
    $parallax.priv.onParallax = function() {
        // recorremos los elementos
        for ( var i in $parallax.elements) {
            // obtenemos el elemento
            var $element = $parallax.elements[i];
            // porcentaje
            var $percent = 100 / $element.width * $element.parent.width();
            $percent = 100 - ((100 - $percent) / 100 * (100 - $percent));
            var $actualLeft = $($element.id).position().left / 100 * $percent;
            var $actualTop = $($element.id).position().top / 100 * $percent;
            var $movementX = (($element.left + ($element.x / 100 * $parallax.priv.moveX)) - $actualLeft) / 10;
            var $movementY = (($element.top + ($element.y / 100 * $parallax.priv.moveY)) - $actualTop) / 10;
            $($element.id).css({
            left: $actualLeft + $movementX,
            top: $actualTop + $movementY
            });
        }
    };
    /**
     * Slider
     * 
     * @param element jQuery selector
     * @param options Options object<br>
     *        speed: Velocidad de movimiento entre sliders<br>
     *        back: jQuery selector para el boton atras, default {element}-back<br>
     *        next: jQuery selector para el boton siguiente, default {element}-next<br>
     *        auto: Tiempo en segundos para auto next, false disables, default 5
     */
    var $slider = registerPlugin('slider', '1.5');
    $slider.fn = function(element, options) {
        // generamos el grupo del slider
        $slider.elements[element] = {};
        // pointer (for minimized size optimizing)
        var $element = $slider.elements[element];
        $element.sliders = [];
        $element.count = 0;
        $element.pos = 0;
        $element.next = 0;
        $element.speed = options.speed | 50;
        $element.bback = typeof options.back !== 'undefined' ? options.back : element + '-back';
        $element.bnext = typeof options.next !== 'undefined' ? options.next : element + '-next';
        $element.auto = typeof options.auto !== 'undefined' ? options.auto : 5;
        $element.width = $(element).width();
        $element.working = false;
        // verificamos si esta habilitado
        if ($element.auto !== false)
            // habilitamos el auto
            $element.autoInterval = setInterval(function() {
                // pasamos al siguiente slider
                $($element.bnext).click();
            }, $element.auto * 1000);
        $(element).find('li').each(function() {
            // almacenamos el elemento
            $element.sliders[$element.count] = $(this);
            // aumentamos la cantidad
            $element.count++;
            // verificamos si no es el primero
            if ($element.count > 1)
                // ocultamos el contenido
                $(this).hide();
        });
        $(element).mouseover(function() {
            // deshabilitamos el auto
            clearInterval($element.autoInterval);
        });
        $(element).mouseout(function() {
            // verificamos si esta habilitado
            if ($element.auto !== false)
                // habilitamos el auto
                $element.autoInterval = setInterval(function() {
                    // pasamos al siguiente slider
                    $($element.bnext).click();
                }, $element.auto * 1000);
        });
        $($element.bnext).click(function() {
            // verificamos la bandera
            if ($element.working)
                return;
            // modificamos la bandera
            $element.working = true;
            // calculamos el siguiente elemento
            $element.next = $element.pos + 1 < $element.count ? $element.pos + 1 : 0;
            // posicionamos le siguiente elemento
            $element.sliders[$element.next].css({
                'left': $element.width + 'px'
            }).show();
            $element.interval = setInterval(function() {
                // calculamos el porcentaje de distancia al medio
                var $percent = parseInt($element.sliders[$element.next].css('left')) - ($element.width / 2);
                $percent = Math.round(100 - Math.abs(100 / ($element.width / 2) * $percent));
                $percent = (parseInt($element.sliders[$element.next].css('left')) - ($element.speed / 100 * ($percent < 1 ? 1 : $percent)));
                // movemos el elemento
                $element.sliders[$element.next].css({
                    'left': $percent + 'px'
                });
                $element.sliders[$element.pos].css({
                    'left': ($percent - $element.width) + 'px'
                });
                // verificamos si llego a 0
                if (parseInt($element.sliders[$element.next].css('left')) <= 0) {
                    // cancelamos el interval
                    clearInterval($element.interval);
                    // ocultamos el elemento anterior
                    $element.sliders[$element.pos].hide();
                    // posicionamos a 0 por seguridad
                    $element.sliders[$element.next].css({
                        'left': 0
                    });
                    // actualizamos la posicion
                    $element.pos = $element.next;
                    // modificamos la bandera
                    $element.working = false;
                }
            }, 15);
        });
        $($element.bback).click(function() {
            // verificamos la bandera
            if ($element.working)
                return;
            // modificamos la bandera
            $element.working = true;
            // calculamos el siguiente elemento
            $element.next = $element.pos > 0 ? $element.pos - 1 : $element.count - 1;
            // posicionamos le siguiente elemento
            $element.sliders[$element.next].css({
                'left': -$element.width + 'px'
            }).show();
            $element.interval = setInterval(function() {
                // calculamos el porcentaje de distancia al medio
                var $percent = parseInt($element.sliders[$element.pos].css('left')) - ($element.width / 2);
                $percent = Math.round(100 - Math.abs(100 / ($element.width / 2) * $percent));
                $percent = (parseInt($element.sliders[$element.pos].css('left')) + ($element.speed / 100 * ($percent < 5 ? 5 : $percent)));
                // movemos el elemento
                $element.sliders[$element.next].css({
                    'left': ($percent - $element.width) + 'px'
                });
                $element.sliders[$element.pos].css({
                    'left': $percent + 'px'
                });
                // verificamos si llego a 0
                if (parseInt($element.sliders[$element.next].css('left')) >= 0) {
                    // cancelamos el interval
                    clearInterval($element.interval);
                    // ocultamos el elemento anterior
                    $element.sliders[$element.pos].hide();
                    // posicionamos a 0 por seguridad
                    $element.sliders[$element.next].css({
                        'left': 0
                    });
                    // actualizamos la posicion
                    $element.pos = $element.next;
                    // modificamos la bandera
                    $element.working = false;
                }
            }, 15);
        });
    };
    /**
     * Swipe
     */
    var $swipe = registerPlugin('swipe', '1.4');
    $swipe.fn = function(element, orientation) {
        // valor por defecto
        if (orientation === undefined)
            // por defecto es vertical
            orientation = 'vertical';
        // agregamos el elemento
        $swipe.elements[element] = {};
        // pointer (for minimized size optimizing)
        var $element = $swipe.elements[element];
        $element.id = element;
        $element.timeout = null;
        $element.sticky = null;
        $element.pos = 0;
        $element.last = 0;
        // asignamos el evento
        $(element).on('drag', function(e) {
            // posicion actual
            $element.last = $element.pos + e.dx;
            // cancelamos los timeouts
            clearTimeout($element.timeout);
            clearTimeout($element.sticky);
            // seteamos el timeout
            $element.timeout = setTimeout(function() {
                // reemplazamos la posicion
                $element.pos = $element.last;
                // ejecutamos el sticky
                $element.sticky = setTimeout(function() {
                    // ejecutamos el evento sticky
                    $swipe.priv.sticky(element);
                }, 15);
            }, 100);
            // movemos el elemento
            $(this).css({
                'margin-left': ($element.pos + e.dx) + 'px'
            });
        });
    };
    $swipe.init = function() {
        // verificamos si esta definido
        if (typeof $.Finger === 'undefined') {
            // mostramos una alerta
            _.log('[WholeAuth:FX:Swipe] WARN jQuery Finger is not defined!');
            return;
        }
        // eliminamos el evento por defecto
        $.Finger.preventDefault = true;
    };
    $swipe.priv.sticky = function(element) {
        // obtenemos el elemento
        var $element = $swipe.elements[element];
        // verificamos si la posicion es mayor
        if ($element.pos > 1) {
            // movemos el elemento de forma gradual
            $element.pos -= $element.pos * .15;
            $element.sticky = setTimeout(function() {
                $swipe.priv.sticky(element);
            }, 15);
        } else if (Math.abs($element.pos) > $($element.id).width() - $($element.id).parent().width() + 1) {
            // movemos el elemento de forma gradual
            var $diff = $($element.id).width() - $($element.id).parent().width(); // diferencia tamaños
            $element.pos += (Math.abs($element.pos) - $diff) * .15;
            $element.sticky = setTimeout(function() {
                $swipe.priv.sticky(element);
            }, 15);
        }
        $($element.id).css({
            'margin-left': ($element.pos) + 'px'
        });
    };
}(jQuery, WholeAuth));