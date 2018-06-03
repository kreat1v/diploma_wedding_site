startLimit = 5;

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
                limit: 5
            },

            success: function(response) {
                var data = JSON.parse(response);
                startLimit = startLimit + 5;

                var mes = '';

                data.data.map(function(element) {
                    mes += '<div class="mes-user text">' +
                        '<div><span>Вы, ' + element.date + '</span><p>' + element.message + '</p></div>' +
                        '<div class="avt"><img src="' + data.avatar + '"></div>' +
                        '</div>';
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