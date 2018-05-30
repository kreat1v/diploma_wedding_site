$(document).ready(function() {

    // Маска для ввода номера телефона.
    $("#telephone").mask("+38 (999) 999 - 99 - 99");

    var email = $('#email').val();

    // Функция валидации формы данных.
    function validData(context) {

        // Для удобства записываем обращения к атрибуту и значению каждого поля в переменные
        var id = $(context).attr('id');
        var val = $(context).val();

        // После того, как поле потеряло фокус, перебираем значения id, совпадающие с id данного поля
        switch (id) {

            case 'first-name':

                var firstName = /^[а-яёa-z]+$/iu;
                if (val == '' || firstName.test(val)) {
                    errorOff($(context));
                } else {
                    errorOn($(context));
                }
                break;

            case 'second-name':

                var secondName = /^[а-яёa-z]+$/iu;

                if (val == '' || secondName.test(val)) {
                    errorOff($(context));
                } else {
                    errorOn($(context));
                }
                break;

            case 'email':

                if (val == email) {
                    errorOff($(context));
                    break;
                }

                var newEmail = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;

                if (val != '' && newEmail.test(val)) {

                    errorOff($(context));

                    $.ajax({
                        url: '/user/checkemail',
                        type: 'post',
                        data: {
                            email: val
                        },

                        success: function(response) {
                            if (response) {
                                $('#email').removeClass('not_error').addClass('error');
                                $('#email').parent().addClass('valid');
                                $('.check-email').fadeIn();
                            } else {
                                $('.check-email').fadeOut();
                            }
                        }
                    });
                } else {
                    $('.check-email').fadeOut();
                    errorOn($(context));
                }
                break;

        }

    }

    // Аналогичная функция валидации для формы смены пароля.
    function validPassword(context) {

        var id = $(context).attr('id');
        var val = $(context).val();

        switch (id) {

            case 'old-password':

                if (val != '' && val.length > 7 && val.length < 11) {
                    errorOff($(context));
                } else {
                    errorOn($(context));
                }
                break;

            case 'password':

                var newPass = /^([a-zA-Zа-яА-Я0-9#@_-])+/;

                if (val != '' && newPass.test(val) && val.length > 7 && val.length < 11) {
                    errorOff($(context));
                } else {
                    errorOn($(context));
                }
                break;

            case 'confirm-password':

                if (val === $('#password').val()) {
                    errorOff($(context));
                } else {
                    errorOn($(context));
                }
                break;
        }

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

    // Устанавливаем обработчик потери фокуса для полей формы данных.
    $('input#first-name, input#second-name, input#email').unbind().blur(function() {

        // Запускаем валидацию.
        validData(this);

    });

    // Устанавливаем обработчик потери фокуса для полей формы смены пароля.
    $('input#old-password, input#password, input#confirm-password').unbind().blur(function() {

        // Запускаем валидацию.
        validPassword(this);

    });

    // Показать тултип подсказки при наведении
    $('.help').mouseenter(function() {

        $(this).find('.tooltips-top').fadeIn();

    });

    // Скрыть тултип подсказки
    $('.help').mouseleave(function() {

        $(this).find('.tooltips-top').fadeOut();

    });

    $('form#data-form').submit(function() {

        // Запускаем валидацию.
        validData($('#first-name'));
        validData($('#second-name'));
        validData($('#email'));

        // Если количество полей с классом ошибки больше 0, мы возвращаем false, останавливая отправку данных в невалидной форме.
        if ($('.error').length > 0) {
            return false;
        }

    });

    // Аналогичные действия для формы смены пароля.
    $('form#password-form').submit(function() {

        validPassword($('#old-password'));
        validPassword($('#password'));
        validPassword($('#confirm-password'));

        if ($('.error').length > 0) {
            return false;
        }

    });

});