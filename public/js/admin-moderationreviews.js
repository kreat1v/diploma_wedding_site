// При клике на кнопку запускаем нашу функцию.
$('.bt-activate').click(function() {

    // Получаем состояние отзыва, id отзыва и его категорию.
    var context = this,
        active = $(context).val(),
        id = $(context).attr('data-id'),
        category = $(context).attr('data-category');

    // Если выбрана активация, посылаем запрос на активацию, если деактивация, то, соответственно, на деактивацию.
    if (active == 0) {

        // Запускаем модальное окно.
        $('.modal').fadeIn();

        // Если нажимают подтверждение, отзыв деактивируется.
        $('#modal-yes').click(function() {

            $.ajax({
                url: '/admin/moderationreviews/deactivate',
                type: 'post',
                data: {
                    id: id,
                    category: category
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
            url: '/admin/moderationreviews/activate',
            type: 'post',
            data: {
                id: id,
                category: category
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