$(function() {
    // buscamos los form con propiedad generic
    $('form[generic="true"]').each(function() {
        var $form = $(this);
        // obtenemos el boton submit
        var $submit = $form.find('[type="submit"]');
        // almacenamos el mensaje original
        $submit.prop('original-text', $submit.find('span').text());
        $submit.click(function() {
            // verificamos si ya envio
            if ($submit.find('span').text() == 'Enviado')
                // salimos
                return false;
            var $error = false;
            // recorremos los campos
            var $fields = {};
            // obtenemos los nombres de los campos
            $form.find('input,select,textarea').each(function() {
                var $field = $(this);
                // almacenamos el valor del campo
                $fields[$field.attr('name')] = null;
            });
            // recorremos los campos
            for ( var name in $fields) {
                // almacenamos el tipo de campo
                var $type = $form.find('[name="' + name + '"]').attr('type');
                if ($type !== undefined)
                    switch ($type) {
                        case 'checkbox':
                            $fields[name] = $form.find('[name="' + name + '"]:checked').val();
                            break;
                        case 'radio':
                            $fields[name] = $form.find('[name="' + name + '"]:selected').val();
                            break;
                        default:
                            $fields[name] = $form.find('[name="' + name + '"]').val();
                            break;
                    }
                else
                    $fields[name] = $form.find('[name="' + name + '"]').val();
            }
            // recorremos todos los campos
            $form.find('input,select,textarea').each(function() {
                // obtenemos el campo
                var $field = $(this);
                // verificamos si es obligatorio
                if ($field.attr('mandatory') == 'true' && $field.val().length == 0) {
                    // agregamos el class error
                    $field.addClass('error');
                    // modificamos la bandera
                    $error = true;
                }
                // eliminamos el class error
                $field.keyup(function() {
                    $field.removeClass('error');
                });
            });
            // verificamos si hay algun campo con error
            if ($error)
                // salimos
                return false;
            // agregamos el tipo de form
            $fields.to = $form.attr('to');
            $fields.action = $form.attr('action');
            $fields.subject = $form.attr('subject');
            $submit.find('span').attr('data-hover', 'Enviando').text('Enviando');
            // enviamos el form a module/form
            _.module('forms', $fields, function(data) {
                // verificamos si envio
                if (!data.success) {
                    _.alert(data.message);
                    $submit.find('span').attr('data-hover', $submit.prop('original-text')).text($submit.prop('original-text'));
                    return;
                }
                // seteamos resultado
                $submit.find('span').attr('data-hover', 'Enviado').text('Enviado');
            });
            // cancelamos la accion por defecto
            return false;
        });
    });
});