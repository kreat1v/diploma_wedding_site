// Создание галереи.
$(function() {

    $('.thumbs a').touchTouch();

});



// Формирование комментариев.
// Стартовое число для запроса - позиция, с которой будут извлекаться данные.
var startLimit = 5;

// Функция подгрузки комментариев.
function scrollalert() {

    // Получаем данные прокрутки, а так же id истории.
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

                // Формируем комментарии и ответы к ним.
                data.map(function(element) {

                    // Вспомогательные переменные.
                    var name = '',
                        mesAnsw = '',
                        styleImageLike = '',
                        styleActiveImageLike = 'like-off',
                        styleNumberLike = '';

                    // Получаем имя комментатора.
                    if (element['firstName'] !== null) {
                        name = element['firstName'];
                    } else {
                        name = element['email'];
                    }

                    // Получаем ответы.
                    element.answers.map(function(elementAnsw) {
                        var nameAnsw = '';

                        // Получаем имя комментатора.
                        if (elementAnsw['firstName'] !== null) {
                            nameAnsw = elementAnsw['firstName'];
                        } else {
                            nameAnsw = elementAnsw['email'];
                        }

                        // Составляем строку ответов.
                        mesAnsw += '<div class="container text">' +
                            '<div>' +
                            '<span>' + nameAnsw + ', ' + elementAnsw.date + '</span>' +
                            '<p>' + elementAnsw.messages + '</p>' +
                            '</div>' +
                            '<div class="avt"><img src="' + elementAnsw.avatar + '"></div>' +
                            '</div>';

                    });

                    // Добавляем строки ответов в объект.
                    arrAnsw[element.id] = mesAnsw;

                    // Формируем стили для отображения лайков.
                    if (element.like) {
                        styleImageLike = 'like-off';
                        styleActiveImageLike = '';
                        styleNumberLike = 'like-number-active';
                    }

                    // Формируем строку комментариев.
                    mes += '<div class="container text">' +
                        '<div>' +
                        '<span>' + name + ', ' + element.date + '</span>' +
                        '<p>' + element.messages + '</p>' +
                        '<div class="panels">' +
                        '<div class="like" data-item="comments" data-id="' + element.id + '">' +
                        '<span class="like-image ' + styleImageLike + '">' +
                        '<i class="far fa-heart"></i>' +
                        '</span>' +
                        '<span class="like-active ' + styleActiveImageLike + '">' +
                        '<i class="fas fa-heart"></i>' +
                        '</span>' +
                        ' <span class="like-number ' + styleNumberLike + '"> ' +
                        element.likesCount +
                        '</span>' +
                        '</div>' +
                        '<div class="answ">' +
                        '<span><i class="fas fa-reply"></i></span>' +
                        '<span> ' + element.answers.length + '</span>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="avt"><img src="' + element.avatar + '"></div>' +
                        '</div>' +
                        '<div class="answers">' +
                        '<div class="form-answ">' +
                        '<form method="post">' +
                        '<textarea name="answers"></textarea>' +
                        '<div class="count-answ text">' +
                        '<span>300</span>' +
                        '</div>' +
                        '<input type="hidden" name="id" value="' + element.id + '">' +
                        '<button class="button" type="submit" name="button" value="answers"><i class="fas fa-reply fa-2x"></i></button>' +
                        '</form>' +
                        '</div>' +
                        arrAnsw[element.id] +
                        '</div>';
                });

                // Добавляем новую партию комментариев.
                $('#messages').append(mes);
            }
        });

    }

    // Устанавливаем setTimeout, чтобы периодически проверять положение ползунка, чтобы, при необходимости, извлечь новые элементы.
    setTimeout('scrollalert();', 1500);

    // Обновляем скролл.
    $('.answers textarea').niceScroll();
}



// Лайки.
$('body').on('click', '.like', function() {

    // Получаем объект, на котором кликнули, а также дополнительные данные.
    var parent = $(this),
        item = $(parent).attr('data-item'),
        id = $(parent).attr('data-id'),
        likes = $(parent).find('.like-number').text();

    $.ajax({
        url: '/stories/like',
        type: 'post',
        data: {
            item: item,
            id: id
        },

        // В зависимости от события, добавим или удалим лайк.
        success: function(response) {
            var data = JSON.parse(response);

            if (data.result === 'like') {

                $(parent).find('.like-image').addClass('like-off');
                $(parent).find('.like-active').removeClass('like-off');
                $(parent).find('.like-number').text(+likes + 1).addClass('like-number-active');

            } else if (data.result === 'dislike') {

                $(parent).find('.like-image').removeClass('like-off');
                $(parent).find('.like-active').addClass('like-off');
                $(parent).find('.like-number').text(+likes - 1).removeClass('like-number-active');

            } else {

                console.log(data.msg);
            }
        },

        error: function(response) {

            console.log('Error!');

        }

    });
});



// Ответы.
// По клику на кнопке ответов открываем список ответов.
$('body').on('click', '.answ', function() {

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



    // Ограниченное количество символов для фомы ответов.
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