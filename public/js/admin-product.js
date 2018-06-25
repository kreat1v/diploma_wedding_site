$(document).ready(function() {

    // Ограниченное количество символов для контактного текстового поля.
    // Показываем и скрываем счётчик набранного текста.
    $('#contacts-ru, #contacts-en').focusin(function() {
        $(this).nextAll('.count').fadeIn();
    });

    $('#contacts-ru, #contacts-en').focusout(function() {
        $(this).nextAll('.count').fadeOut();
    });

    // Функция подсчёта количества введенных символов.
    function maxLen(context) {
        // Максимальное количество символов, объект со счетчиком.
        var max = 100,
            countSpan = $(context).nextAll('.count').find('span');

        // Если введенное количество символов превышает максимальное, то лишнее обрезаем, а счетчик приравниваем 0.
        if (context.val().length > max) {
            countSpan.text(0);
            context.val(context.val().substr(0, max));
        } else {
            countSpan.text(max - context.val().length);
        }
    }

    // При нажатии кнопки запускаем функцию подсчёта количества введенных символов.
    $('#contacts-ru, #contacts-en').keyup(function() {

        maxLen($(this));

    });



    // Маска для ввода номера телефона.
    $("#telephone").mask("+38 (999) 999 - 99 - 99");



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
            category = parent.attr('data-category'),
            idProduct = parent.attr('data-id');

        $.ajax({
            url: '/admin/product/deleteimage',
            type: 'post',
            data: {
                name: nameImage,
                category: category,
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

            case 'price':
                var price = /^\d+$/;
                if (val != '' && price.test(val)) {
                    errorOff($(context));
                } else {
                    errorOn($(context));
                }
                break;

            case 'stock':
                var price = /^\d+$/;
                if (val == '' || price.test(val)) {
                    errorOff($(context));
                } else {
                    errorOn($(context));
                }
                break;

            case 'brand':
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

    // Функция валидации для групп чекбоксов и радиокнопок.
    function validCheck(context) {

        var result = false;
        context.find("input").map(function(indx, element) {
            if ($(element).prop("checked")) {
                result = true;
            }
        });

        if (result) {
            errorOff(context);
        } else {
            errorOn(context);
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
    $('input#title-ru, input#title-en, textarea#text-ru, textarea#text-en, input#price, input#stock, input#brand')
        .unbind()
        .blur(function() {

            // Запускаем валидацию.
            validData(this);

        });

    // Устанавливаем обработчик потери фокуса для поля с телефоном.
    $('input#telephone, textarea#contacts-ru, textarea#contacts-en').blur(function() {

        // Запускаем валидацию.
        validData(this);

    });

    // Устанавливаем обработчик при изменении радиокнопок.
    $('#sex input, #size input, #service input').unbind().change(function() {

        // Запускаем валидацию.
        validCheck($(this).parent());

    });

    // При клике на загрузку изображения скрываем сообщение об ошибке.
    $('.file-upload').click(function() {

        $('#galery').removeClass('error').addClass('not_error');
        $('.image-error').fadeOut();

    });

    // Событие при отправке формы.
    $('form#product-form').submit(function() {

        // Запускаем валидацию.
        validData($('#title-ru'));
        validData($('#title-en'));
        validData($('#text-ru'));
        validData($('#text-en'));
        validData($('#price'));
        validData($('#stock'));
        validData($('#brand'));
        validData($('#contacts-ru'));
        validData($('#contacts-en'));
        validData($('#telephone'));
        validCheck($('#sex'));
        validCheck($('#size'));
        validCheck($('#service'));
        validImage();

        // Если количество полей с классом ошибки больше 0, мы возвращаем false, останавливая отправку данных в невалидной форме.
        if ($('.error').length > 0) {
            return false;
        }

    });

});