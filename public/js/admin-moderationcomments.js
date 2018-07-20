// При клике на кнопку запускаем нашу функцию.
$('.bt-activate').click(function() {

    // Получаем состояние комментария и его id.
    var context = this,
        active = $(context).val(),
        id = $(context).attr('data-id');

    // Если выбрана активация, посылаем запрос на активацию, если деактивация, то, соответственно, на деактивацию.
    if (active == 0) {

        // Запускаем модальное окно.
        $('.modal').fadeIn();

        // Если нажимают подтверждение, комментарий деактивируется.
        $('#modal-yes').click(function() {

            $.ajax({
                url: '/admin/moderationcomments/deactivate',
                type: 'post',
                data: {
                    id: id
                },

                success: function(response) {
                    var data = JSON.parse(response);

                    if (data.result === 'success') {

                        $(context).hide();
                        $(context).siblings('button').show();

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

    } else {

        $.ajax({
            url: '/admin/moderationcomments/activate',
            type: 'post',
            data: {
                id: id
            },

            success: function(response) {
                var data = JSON.parse(response);

                if (data.result === 'success') {

                    $(context).hide();
                    $(context).siblings('button').show();

                } else {

                    console.log(data.msg);
                }
            },

            error: function(response) {

                console.log('Error!');

            }

        });

    }

});