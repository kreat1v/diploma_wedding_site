$(document).ready(function() {

    // Маска для ввода номера телефона.
    $(".telephone").mask("+38 (999) 999 - 99 - 99");



    // Валидация.
    // Функция улучшения скролла.
    $(".textarea, textarea.input").niceScroll();

    // Функция, которая делает активным тултип ошибки.
    function errorOn(context) {
        context.removeClass('not_error').addClass('error');
        context.parent().addClass('valid');
        context.next('div').fadeIn();
    }

    // Функция, которая деактивирует тултип ошибки.
    function errorOff(context) {
        context.removeClass('error').addClass('not_error');
        context.parent().removeClass('valid');
        context.next('div').fadeOut();
    }

    // Функция валидации.
    function validData(context) {

        // Для удобства записываем обращения к атрибуту и значению каждого поля в переменные.
        var id = $(context).attr('id');
        var val = $(context).val();

        // После того, как поле потеряло фокус, перебираем значения id, совпадающие с id данного поля.
        switch (id) {

            case 'email':
                var email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;

                if (val != '' && email.test(val)) {
                    errorOff($(context));
                } else {
                    errorOn($(context));
                }
                break;

            default:
                if (val != '') {
                    errorOff($(context));
                } else {
                    errorOn($(context));
                }
                break;

        }
    }

    // Устанавливаем обработчик потери фокуса для полей формы данных.
    $('textarea#ru_text, textarea#en_text, input#ru_address, input#en_address, input#email')
        .unbind()
        .blur(function() {

            // Запускаем валидацию.
            validData(this);

        });

    // Устанавливаем обработчик потери фокуса для поля с телефоном.
    $('input#telephone').blur(function() {

        // Запускаем валидацию.
        validData(this);

    });

    // Событие при отправке формы.
    $('form#contacts-form').submit(function() {

        // Запускаем валидацию.
        validData($('#ru_text'));
        validData($('#en_text'));
        validData($('#ru_address'));
        validData($('#en_address'));
        validData($('#email'));
        validData($('#telephone'));

        // Если количество полей с классом ошибки больше 0, мы возвращаем false, останавливая отправку данных в невалидной форме.
        if ($('.error').length > 0) {
            return false;
        }

    });

});