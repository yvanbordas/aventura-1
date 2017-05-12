(function($this) {
    $this.init = function() {
        $('#btn-login').click(_login);
        $('input[name="pass"]').keyup(function(e) {
            if (e.keyCode == 13)
                _login();
        });
        $('#cancel').click(function() {
            _.screen('.');
        });
    };
    var _login = function() {
        _.lock();
        _.module('auth', {
        user: $('input[name="user"]').val(),
        pass: CryptoJS.MD5($('input[name="pass"]').val()).toString()
        }, function(data) {
            if (!data.success)
                return _.alert(data.message, _.unlock);
            _.screen('sc-paquetes');
        });
    };
}(Lumos));