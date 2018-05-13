$(document).ready(function() {

    // Устанавливаем обработчик потери фокуса для всех полей наших форм
    $('input#login-email, input#login-password, input#register-email, input#register-password, input#register-confpassword').unbind().blur(function() {

        // Для удобства записываем обращения к атрибуту и значению каждого поля в переменные
        var id = $(this).attr('id');
        var val = $(this).val();

        // Изменение z-index длядвижущегося изображения
        if ($('.index').length == 0) {
            $('.sign-up').addClass('index');
        }

        // Функция, которая делает активным тултип ошибки
        function errorOn(context) {
            context.removeClass('not_error').addClass('error');
            context.parent().addClass('valid');
            context.next('div').fadeIn();
        }

        // Функция, которая деактивирует тултип ошибки
        function errorOff(context) {
            context.removeClass('error').addClass('not_error');
            context.parent().removeClass('valid');
            context.next('div').fadeOut();
        }

        // После того, как поле потеряло фокус, перебираем значения id, совпадающие с id данного поля
        switch (id) {

            case 'login-email':

                var re_email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;

                if (val != '' && re_email.test(val)) {
                    errorOff($(this));
                } else {
                    errorOn($(this));
                }
                break;

            case 'login-password':

                if (val != '' && val.length > 7 && val.length < 11) {
                    errorOff($(this));
                } else {
                    errorOn($(this));
                }
                break;

            case 'register-email':

                var re_email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;

                if (val != '' && re_email.test(val)) {
                    errorOff($(this));

                    $.ajax({
                        url: '/login/checkemail',
                        type: 'post',
                        data: {
                            email: val
                        },

                        success: function(response) {
                            if (response) {
                                $('#register-email').removeClass('not_error').addClass('error');
                                $('#register-email').parent().addClass('valid');
                                $('.check-email').fadeIn();
                            } else {
                                $('.check-email').fadeOut();
                            }
                        }
                    });
                } else {
                    $('.check-email').fadeOut();
                    errorOn($(this));
                }
                break;

            case 'register-password':

                var re_pass = /^([a-zA-Zа-яА-Я0-9#@_-])+/;

                if (val != '' && re_pass.test(val) && val.length > 7 && val.length < 11) {
                    errorOff($(this));
                } else {
                    errorOn($(this));
                }
                break;

            case 'register-confpassword':

                if (val === $('#register-password').val()) {
                    errorOff($(this));
                } else {
                    errorOn($(this));
                }
                break;

        }

    });

    // Сброс тултипов и форм во время переключения между режимами регистрации и авторизации
    $('#register').click(function() {

        $('#login-form').get(0).reset();
        $('#register-form').get(0).reset();

        $('.valid').removeClass('valid');
        $('.index').removeClass('index');
        $('.not_error').removeClass('not_error');

        $('.tooltips-left, .tooltips-right').fadeOut();

    });

    // Показать тултип подсказки при наведении
    $('.info').mouseenter(function() {

        $(this).find('.tooltips-top').fadeIn();

    });

    // Скрыть тултип подсказки
    $('.info').mouseleave(function() {

        $(this).find('.tooltips-top').fadeOut();

    });

    $('form#login-form').submit(function() {

        // Если количество полей с данным классом не равно значению 3, мы возвращаем false,
        // останавливая отправку данных в невалидной форме
        if ($('.not_error').length != 2) {
            return false;
        }

    });

    $('form#register-form').submit(function() {

        if ($('.not_error').length != 3) {
            return false;
        }

    });

});