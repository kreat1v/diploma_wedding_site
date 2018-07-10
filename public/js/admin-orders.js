// При клике на кнопку запускаем нашу функцию.
$('.bt-orders').click(function() {

    // Получаем состояние комментария и его id.
    var context = this,
        id = $(context).attr('data-id');

    // Запускаем модальное окно.
    $('.modal').fadeIn();

    // Если нажимают подтверждение, комментарий деактивируется.
    $('#modal-yes').click(function() {

        $.ajax({
            url: '/admin/orders/payment',
            type: 'post',
            data: {
                id: id
            },

            success: function(response) {
                var data = JSON.parse(response);

                if (data.result === 'success') {

                    $(context).hide();
                    $(context).siblings('span').show();


                } else {

                    console.log(data.msg);
                }
            },

            error: function(response) {

                console.log('Error!');

            }

        });

        $('.modal').fadeOut();

    });

    // Если закрывают модальное окно - то ничего не происходит.
    $('#modal-no').click(function() {

        $('.modal').fadeOut();

    });

});