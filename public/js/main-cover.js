$(document).ready(function() {

    // Посылаем запрос на получение имен изображений.
    $.ajax({
        url: '/admin/cover/getimage',
        type: 'post',

        // Если все прошло успешно, то добавляем изображения в обложку.
        success: function(response) {

            var data = JSON.parse(response);

            if (data.result === 'success') {

                $(".main-cover").backstretch(data.images, {
                    duration: 5000,
                    fade: 1000
                });

            } else {

                console.log(data.msg);
            }
        },

        error: function(response) {

            console.log('Error!');

        }

    });

});