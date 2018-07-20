// Обрабатываем первый клик по кнопке.
$('.delete').one('click', function() {

    // Получаем кнопку, на которую нажали, родителя, а также значения, которые будем передавать.
    var context = $(this),
        parent = context.parents('.parent'),
        idFavorites = context.attr('data-idprod');

    $.ajax({
        url: '/user/deletefavorites',
        type: 'post',
        data: {
            id: idFavorites
        },

        // Если все прошло успешно, то убираем строку с товаром.
        success: function(response) {
            var data = JSON.parse(response);

            if (data.result === 'success') {

                parent.fadeOut();

            } else {

                console.log(data.msg);
            }
        },

        error: function(response) {

            console.log('Error!');

        }

    });

});