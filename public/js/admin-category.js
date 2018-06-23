// Функция добавления пробела между абзацами.
function insertTextAtCursor(el, text, offset) {
    var val = el.value,
        endIndex,
        range,
        doc = el.ownerDocument;

    if (typeof el.selectionStart == "number" && typeof el.selectionEnd == "number") {
        endIndex = el.selectionEnd;
        el.value = val.slice(0, endIndex) + text + val.slice(endIndex);
        el.selectionStart = el.selectionEnd = endIndex + text.length + (offset ? offset : 0);
    } else if (doc.selection != "undefined" && doc.selection.createRange) {
        el.focus();
        range = doc.selection.createRange();
        range.collapse(false);
        range.text = text;
        range.select();
    }
}

// По нажатию Enter запускаем функцию для добавления пробела.
$('.textarea').keypress(function(e) {

    // Получаем контекст и код нажатой клавиши.
    var context = $(this),
        code = (e.keyCode ? e.keyCode : e.which);

    // Если нажат Enter - получаем обїект textarea, в котором произошло событие, и запускаем функцию.
    if (code == 13) {
        var obj = context.get(0);

        insertTextAtCursor(obj, '\n');
    }
});

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

        // После того, как поле потеряло фокус, перебираем значения id, совпадающие с id данного поля.
        switch (id) {

            case 'title-ru':
                var title = /^[а-яё]+$/iu;
                if (val != '' && title.test(val)) {
                    errorOff($(context));
                } else {
                    errorOn($(context));
                }
                break;

            case 'title-en':
                var title = /^[a-z]+$/iu;
                if (val != '' && title.test(val)) {
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
    $('input#title-ru, input#title-en, textarea#first-text-ru, textarea#first-text-en, input#full-title-ru, input#full-title-en, textarea#second-text-ru, textarea#second-text-en')
        .unbind()
        .blur(function() {

            // Запускаем валидацию.
            validData(this);

        });

    // Событие при отправке формы.
    $('form#category-form').submit(function() {

        // Запускаем валидацию.
        validData($('#first-name'));
        validData($('#second-name'));
        validData($('#email'));

        // Если количество полей с классом ошибки больше 0, мы возвращаем false, останавливая отправку данных в невалидной форме.
        if ($('.error').length > 0) {
            return false;
        }

    });

});