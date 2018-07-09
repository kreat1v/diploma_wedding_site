if ($('.line2').length != 0) {

    $('.cart-order').show();

}

// Открываем содержимое корзины при клике на ней.
$('#cart').click(function() {

    // Посылаем запрос на получение данных.
    $.ajax({
        url: '/cart/view',
        type: 'post',
        data: {
            name: name
        },

        // Если все прошло успешно, то добавляем данные в отображение корзины.
        success: function(response) {
            var data = JSON.parse(response),
                mes = '';

            // Получаем строку данных.
            data.category.map(function(element) {

                var product = element['category_name'] in data.cart,
                    mesProduct = '';

                if (product) {
                    mesProduct = '<span class="name-product">' +
                        '<a class="link" href="' + data.cart[element['category_name']].link + '">' + data.cart[element['category_name']].title + '</a>' +
                        '</span>' +
                        '<span class="delete" data-name="' + element['category_name'] + '">' +
                        '<i class="fas fa-times"></i>' +
                        '</span>';
                }

                mes += '<li class="text">' +
                    '<span class="dot ' + (product ? 'inactive' : '') + '">' +
                    '<i class="far fa-dot-circle"></i>' +
                    '</span>' +
                    '<span class="check ' + (product ? '' : 'inactive') + '">' +
                    '<i class="fas fa-check-circle"></i>' +
                    '</span>' +
                    '<span class="' + (product ? 'line2' : 'line') + '">' +
                    '<a class="link" href="' + element['link'] + '">' + element['title'] + '</a>' +
                    '</span>' +
                    mesProduct +
                    '</li>';
            })

            // Добавляем строку в объект корзины.
            $('#cart-main .list ul').append(mes);

            if ($('.line2').length != 0) {

                $('.cart-order').show();

            }

            // Показываем корзину.
            $('#cart-main').fadeIn(500);

        },

        error: function(response) {

            console.log('Error!');

        }

    });

    // При выходе курсора из области корзины скрываем её.
    $('#cart-main').mouseleave(function() {

        $('#cart-main').fadeOut(300);

        // Очищаем объект корзины.
        setTimeout(function() {
            $('#cart-main li').remove();
        }, 300);

    });

});

// При клике на кнопке удаления товара запускаем запрос на удаление его из сессии.
$('body').on('click', '.delete', function() {

    var context = this,
        name = $(context).attr('data-name');

    $.ajax({
        url: '/cart/delete',
        type: 'post',
        data: {
            name: name
        },

        // Если все прошло успешно, то удаляем услугу.
        success: function(response) {
            var data = JSON.parse(response);

            if (data.result === 'success') {

                $(context).siblings('.line2').removeClass('line2').addClass('line');
                $(context).fadeOut('100');
                $(context).siblings('.name-product').fadeOut('100');
                $(context).siblings('.check').slideUp('100');
                $(context).siblings('.dot').slideDown('100');

                if ($('.line2').length == 0) {
                    $('.cart-order').fadeOut('100');
                }

            } else {

                console.log(data.msg);
            }
        },

        error: function(response) {

            console.log('Error!');

        }

    });

});