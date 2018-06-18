// Стартовое число для запроса - позиция, с которой будут извлекаться данные.
var startLimit = 5;

// Функция подгрузки сообщений.
function scrollalert() {

    // Получаем данные прокрутки, а так же имя категории, ссылку на метод и id продукта.
    var scrolltop = $('#messages').prop('scrollTop'),
        scrollheight = $('#messages').prop('scrollHeight'),
        windowheight = $('#messages').prop('clientHeight'),
        category = $('.reviews').attr('data-category'),
        link = '/' + category + '/getReviews',
        idProduct = $('.reviews').attr('data-product'),
        scrolloffset = 20;

    // Если блок прокручен до конца - подгружаем данные.
    if (scrolltop >= (scrollheight - (windowheight + scrolloffset))) {

        $.ajax({
            url: link,
            type: 'post',
            data: {
                start: startLimit,
                limit: 5,
                id_product: idProduct
            },

            success: function(response) {
                var data = JSON.parse(response),
                    mes = '';

                startLimit = startLimit + 5;

                // Распредялем сообщения на админские и юзера.
                data.data.map(function(element) {
                    var name = '';

                    if (element['firstName'] !== null) {
                        name = element['firstName'];
                    } else {
                        name = element['email'];
                    }

                    mes += '<div class="container text">' +
                        '<div><span>' + name + ', ' + element.date + '</span><p>' + element.reviews + '</p></div>' +
                        '<div class="avt"><img src="' + element.avatar + '"></div>' +
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

$(document).ready(function() {

    // Оформление скрола.
    $("#messages").niceScroll();

    // Запускаем нашу функцию подгрузки сообщений.
    scrollalert();

});