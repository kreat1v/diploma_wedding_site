$(document).ready(function() {

    // Функция улучшения скролла.
    $(".textarea").niceScroll();

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

        // Запускаем или отключаем сообщение об ошибке.
        if (val != '') {
            errorOff($(context));
        } else {
            errorOn($(context));
        }

    }

    // Устанавливаем обработчик потери фокуса для полей формы данных.
    $('textarea#messages')
        .blur(function() {

            // Запускаем валидацию.
            validData(this);

        });

    // Событие при отправке формы.
    $('form#moderationedit-form').submit(function() {

        // Если количество полей с классом ошибки больше 0, мы возвращаем false, останавливая отправку данных в невалидной форме.
        if ($('.error').length > 0) {
            return false;
        }

    });

});