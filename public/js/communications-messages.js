// Стартовое число для запроса - позиция, с которой будут извлекаться данные.
var startLimit = 3;

// Функция подгрузки сообщений.
function scrollalert() {

    // Получаем данные прокрутки.
    var scrolltop = $('#messages').prop('scrollTop'),
        scrollheight = $('#messages').prop('scrollHeight'),
        windowheight = $('#messages').prop('clientHeight'),
        scrolloffset = 20;

    // Если блок прокручен до конца - подгружаем данные.
    if (scrolltop >= (scrollheight - (windowheight + scrolloffset))) {

        $.ajax({
            url: '/user/getMessages',
            type: 'post',
            data: {
                start: startLimit,
                limit: 3
            },

            success: function(response) {
                var data = JSON.parse(response),
                    mes = '';

                startLimit = startLimit + 3;

                // Распредялем сообщения на админские и юзера.
                data.data.map(function(element) {
                    if (typeof element['admin'] === "undefined") {
                        mes += '<div class="mes-user text">' +
                            '<div><span>Вы, ' + element.date + '</span><p>' + element.message + '</p></div>' +
                            '<div class="avt"><img src="' + data.avatar + '"></div>' +
                            '</div>';
                    } else {
                        mes += '<div class="mes-admin text">' +
                            '<div class="avt"><img src="' + data.adminAvatar + '"></div>' +
                            '<div><span>Admin, ' + element.date + '</span><p>' + element.message + '</p></div>' +
                            '</div>';
                    }
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