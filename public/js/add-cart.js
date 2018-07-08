// Обрабатываем первый клик по кнопке.
$('.cart-bt').one('click', function() {

    // Получаем кнопку, на которую нажали, а также значения, которые будем передавать.
    var context = $(this),
        product = context.prevAll('.id_products').val(),
        category = context.prevAll('.category').val();

    $.ajax({
        url: '/clothes/addcart',
        type: 'post',
        data: {
            id_products: product,
            category: category
        },

        // Если все прошло успешно, то убираем кнопку добавления в избранное.
        success: function(response) {
            var data = JSON.parse(response);

            if (data.result === 'success') {

                $('.cart-bt').fadeOut(300);

            } else {

                console.log(data.msg);
            }
        },

        error: function(response) {

            console.log('Error!');

        }

    });

});