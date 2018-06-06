startLimit = 3;

// Функция подгрузки сообщений.
function scrollalert() {
    var scrolltop = $('#messages').prop('scrollTop');
    var scrollheight = $('#messages').prop('scrollHeight');
    var windowheight = $('#messages').prop('clientHeight');
    var scrolloffset = 20;

    if (scrolltop >= (scrollheight - (windowheight + scrolloffset))) {

        $.ajax({
            url: '/user/getMessages',
            type: 'post',
            data: {
                start: startLimit,
                limit: 3
            },

            success: function(response) {
                var data = JSON.parse(response);

                startLimit = startLimit + 3;

                var mes = '';

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

                $('#messages').append(mes);
            }
        });

    }

    setTimeout('scrollalert();', 1500);
}

$(document).ready(function() {

    // Оформление скрола.
    $("#messages").niceScroll();

    // Запускаем нашу функцию подгрузки сообщений.
    scrollalert();

});