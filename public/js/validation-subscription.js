$(document).ready(function() {

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

    function validData(context) {

        // Для удобства записываем обращения к атрибуту. Так же создаим переменную с регулярным выражением.
        var id = $(context).attr('id'),
            val = $(context).val(),
            email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;

        if (val != '' && email.test(val)) {

            $.ajax({
                url: '/subscription/checkemail',
                type: 'post',
                data: {
                    email: val
                },

                success: function(response) {

                    errorOff($(context));

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

    }

    // Устанавливаем обработчик потери фокуса для всех полей наших форм
    $('input#email').unbind().blur(function() {

        // Запускаем валидацию.
        validData($('#email'));

    });

    $('form#subscription-form').submit(function() {

        // Запускаем валидацию.
        validData($('#email'));

        // Если есть ошибки валидации - отменим отправку формы.
        if ($('.not_error').length != 1) {
            return false;
        }

    });

});