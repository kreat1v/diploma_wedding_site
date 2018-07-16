// Установка куки для рассылок.
$(document).ready(function() {

    // Прверим наличие куки.
    if ($.cookie('subscription') != 'no') {

        // Если куки нету, то запустим модальное окно.
        setTimeout(function() {
            $('.modal').fadeIn();
        }, 15000)

    }

    // Если соглашаются - установим куку и перебросим на страницу подписки.
    $('#modal-yes').click(function() {

        $.cookie('subscription', 'no', {
            expires: 1,
            path: '/'
        });

    });

    // Если закрывают модальное окно - то устнаовим куку и всё.
    $('#modal-no').click(function() {

        $('.modal').fadeOut();

        $.cookie('subscription', 'no', {
            expires: 1,
            path: '/'
        });

    });

});