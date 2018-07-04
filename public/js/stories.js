// Создание галереи.
$(function() {

    $('.thumbs a').touchTouch();

});



// Формирование комментариев.
// Стартовое число для запроса - позиция, с которой будут извлекаться данные.
var startLimit = 5;

// Функция подгрузки сообщений.
function scrollalert() {

    // Получаем данные прокрутки, а так же имя категории, ссылку на метод и id продукта.
    var scrolltop = $('#messages').prop('scrollTop'),
        scrollheight = $('#messages').prop('scrollHeight'),
        windowheight = $('#messages').prop('clientHeight'),
        idStories = $('.stories-view').attr('data-id'),
        scrolloffset = 20;

    // Если блок прокручен до конца - подгружаем данные.
    if (scrolltop >= (scrollheight - (windowheight + scrolloffset))) {

        $.ajax({
            url: '/stories/getComments',
            type: 'post',
            data: {
                start: startLimit,
                limit: 5,
                id_stories: idStories
            },

            success: function(response) {
                var data = JSON.parse(response),
                    mes = '',
                    arrAnsw = {};

                startLimit = startLimit + 5;

                // Формируем комментарии.
                data.map(function(element) {
                    var name = '',
                        mesAnsw = '';

                    if (element['firstName'] !== null) {
                        name = element['firstName'];
                    } else {
                        name = element['email'];
                    }

                    element.answers.map(function(elementAnsw) {
                        var nameAnsw = '';

                        if (elementAnsw['firstName'] !== null) {
                            nameAnsw = elementAnsw['firstName'];
                        } else {
                            nameAnsw = elementAnsw['email'];
                        }

                        mesAnsw += '<div class="container text">' +
                            '<div>' +
                            '<span>' + nameAnsw + ', ' + elementAnsw.date + '</span>' +
                            '<p>' + elementAnsw.messages + '</p>' +
                            '<div class="panels">' +
                            '<span class="like-comment">' +
                            '<i class="far fa-heart"></i> 10' +
                            '</span>' +
                            '</div>' +
                            '</div>' +
                            '<div class="avt"><img src="' + elementAnsw.avatar + '"></div>' +
                            '</div>';

                    });

                    arrAnsw[element.id] = mesAnsw;

                    mes += '<div class="container text">' +
                        '<div>' +
                        '<span>' + name + ', ' + element.date + '</span>' +
                        '<p>' + element.messages + '</p>' +
                        '<div class="panels">' +
                        '<span class="like-comment">' +
                        '<i class="far fa-heart"></i> 10' +
                        '</span>' +
                        '<span class="answ">' +
                        '<i class="fas fa-reply"></i> ' + element.answers.length +
                        '</span>' +
                        '</div>' +
                        '</div>' +
                        '<div class="avt"><img src="' + element.avatar + '"></div>' +
                        '</div>' +
                        '<div class="answers">' +
                        '<div class="form-answ">' +
                        '<form method="post">' +
                        '<textarea name="answers"></textarea>' +
                        '<div class="count-answ">' +
                        '<span>300</span>' +
                        '</div>' +
                        '<input type="hidden" name="id" value="' + element.id + '">' +
                        '<button class="button" type="submit" name="button" value="answers"><i class="fas fa-reply fa-2x"></i></button>' +
                        '</form>' +
                        '</div>' +
                        arrAnsw[element.id] +
                        '</div>';
                });

                // Добавляем новую партию сообщений.
                $('#messages').append(mes);
            }
        });

    }

    // Устанавливаем setTimeout, чтобы периодически проверять положение ползунка, чтобы, при необходимости, извлечь новые элементы.
    setTimeout('scrollalert();', 1500);
}



// Ответы на комментарии.
// Функция получения ответо на комментарии.
function answers(id) {

    $.ajax({
        url: '/stories/getAnswers',
        type: 'post',
        data: {
            id_comments: id
        },

        success: function(response) {
            var data = JSON.parse(response);
            mes = '';

            // Формируем комментарии.
            data.data.map(function(element) {
                var name = '';

                if (element['firstName'] !== null) {
                    name = element['firstName'];
                } else {
                    name = element['email'];
                }

                mes += '<div class="container text">' +
                    '<div>' +
                    '<span>' + name + ', ' + element.date + '</span>' +
                    '<p>' + element.messages + '</p>' +
                    '</div>' +
                    '<div class="avt"><img src="' + element.avatar + '"></div>' +
                    '</div>';
            });

            // Добавляем новую партию сообщений.
            $('.answers').append(mes);
        }
    });

}

// По клику на кнопке редактирования сообщения открываем форму редактирования.
$('body').on('click', '.answ', function() {

    console.log(0);

    // Получаем объект, в котором был сделан клик.
    var parent = $(this).parents('.container');

    // Если последующий div с ответами активен, то ничего не делаем.
    if ($(parent).next('.answers').hasClass('active')) {
        return;
    }

    // Удаляем все активные метки.
    $('.active').removeClass('active');

    // Скрываем все активные div с ответами.
    $('.answers').hide(200);

    // Присваиваем div с ответами метку активности, что бы повторном клике он не раскрывался.
    $(parent).next('.answers').addClass('active');

    // Показываем div с ответами.
    $(parent).next('.answers').show(500);

});



$(document).ready(function() {

    // Оформление скрола.
    $('#messages').niceScroll();
    $('.answers textarea').niceScroll();

    // Запускаем нашу функцию подгрузки комментариев.
    scrollalert();



    // Ограниченное количество символов для контактного текстового поля.
    // Показываем и скрываем счётчик набранного текста.
    $('body').on('focusin', '.answers textarea', function() {
        $(this).nextAll('.count-answ').fadeIn();
    });

    $('body').on('focusout', '.answers textarea', function() {
        $(this).nextAll('.count-answ').fadeOut();
    });

    // Функция подсчёта количества введенных символов.
    function maxLen(context) {
        // Максимальное количество символов, объект со счетчиком.
        var max = 300,
            countSpan = $(context).nextAll('.count-answ').find('span');

        // Если введенное количество символов превышает максимальное, то лишнее обрезаем, а счетчик приравниваем 0.
        if (context.val().length > max) {
            countSpan.text(0);
            context.val(context.val().substr(0, max));
        } else {
            countSpan.text(max - context.val().length);
        }
    }

    // При нажатии кнопки запускаем функцию подсчёта количества введенных символов.
    $('body').on('keyup', '.answers textarea', function() {

        maxLen($(this));

    });

});