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

    // Работа с изображениями.
    // Функция дополнения формами загрузки изображений если их количество меньше 7ми.
    function makeInput() {

        // Получаем длинну массива с элементами галереи.
        var length = $('#galery div').length;

        // Если элементов меньше 7ми, то вставляем недостающие инпуты.
        if (length < 7) {
            var div = '<div class="file-upload">' +
                '<label>' +
                '<input type="file" name="photo[]" class="imgInput">' +
                '<i class="fas fa-plus-circle fa-2x"></i>' +
                '</label>' +
                '<img src="" />' +
                '<span class="delete-previous">' +
                '<i class="fas fa-times-circle"></i>' +
                '</span>' +
                '</div>';

            for (var i = length; i < 7; i++) {
                $('#galery').append(div);
            }
        }
    }

    // Функция создания превью изображения.
    function newImage(input, label) {

        // Если загружаемый файл не изображение - ничего не загружаем.
        if (!input.files[0].type.match('image.*')) {
            return;
        }

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            // Получаем данные загруженного изображения.
            reader.onload = function(e) {
                label.find('img').attr('src', e.target.result).css('display', 'block').addClass('product-image');
                label.find('.delete-previous').css('display', 'block');
                label.find('label').css('display', 'none');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    // При загрузке страницы запускаем функцию дополнения галереи инпутами.
    makeInput();

    // При загрузке изображения запускаем функцию создания превью.
    $('body').on('change', '.imgInput', function() {
        var parent = $(this).parents('.file-upload');

        newImage(this, parent);
    });

    // При клике на кнопке удаления превью - запускаем удаление div с инпутом.
    $('body').on('click', '.delete-previous', function() {
        var parent = $(this).parents('.file-upload');

        parent.remove();

        // Запускаем функцию дополнения галереи инпутами.
        makeInput();
    });

    // При клике на кнопке удаления изображения - запускаем удаление div с изображением, а так же удаляем само изображение.
    $('body').on('click', '.delete-image', function() {

        // Получаем кнопку, на которую нажали, родителя, а также значения, которые будем передавать.
        var context = $(this),
            parent = context.parents('.file-upload'),
            nameImage = parent.attr('data-name'),
            idProduct = parent.attr('data-id');

        $.ajax({
            url: '/admin/stories/deleteimage',
            type: 'post',
            data: {
                name: nameImage,
                id: idProduct
            },

            // Если все прошло успешно, то удаляем превью изображения.
            success: function(response) {

                var data = JSON.parse(response);

                if (data.result === 'success') {

                    parent.remove();

                    // Запускаем функцию дополнения галереи инпутами.
                    makeInput();

                } else {

                    console.log(data.msg);
                }
            },

            error: function(response) {

                console.log('Error!');

            }

        });

    });



    // Функция улучшения скролла.
    $(".textarea").niceScroll();



    // Валидация.
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

        // Если значение поля пустое - запускаем ошибку.
        var val = $(context).val();

        if (val != '') {
            errorOff($(context));
        } else {
            errorOn($(context));
        }

    }

    // Валидация загрузки изображений.
    function validImage() {

        var imagesCount = $('.product-image').length;

        // Если изображений нету, то покажем ошибку.
        if (imagesCount != 0) {
            $('#galery').removeClass('error').addClass('not_error');
            $('.image-error').fadeOut();
        } else {
            $('#galery').removeClass('not_error').addClass('error');
            $('.image-error').fadeIn();
        }

    }

    // Устанавливаем обработчик потери фокуса для полей формы данных.
    $('input#title-ru, input#title-en, textarea#content-ru, textarea#content-en').blur(function() {

        // Запускаем валидацию.
        validData(this);

    });

    // При клике на загрузку изображения скрываем сообщение об ошибке.
    $('.file-upload').click(function() {

        $('#galery').removeClass('error').addClass('not_error');
        $('.image-error').fadeOut();

    });

    // Событие при отправке формы.
    $('form#stories-form').submit(function() {

        // Запускаем валидацию.
        validData($('#title-ru'));
        validData($('#title-en'));
        validData($('#content-ru'));
        validData($('#content-en'));
        validImage();

        // Если количество полей с классом ошибки больше 0, мы возвращаем false, останавливая отправку данных в невалидной форме.
        if ($('.error').length > 0) {
            return false;
        }

    });

});