// По клику на кнопке редактирования сообщения открываем форму редактирования.
$('.edit').click(function() {

    // Если какая-ллибо форма уже открыта, она закроется. Иначе форма открывается.
    if ($('.form-edit').length) {

        $('.form-edit').remove();

    } else {

        // Получаем родителя нажатой кнопки и текст сообщения, который редактируем. Так же в переменную записываем форму редактирования.
        var parent = $(this).parents('.mes-admin'),
            mes = $(parent).find('p').text(),
            form = '<div class="form-edit">' +
            '<form>' +
            '<textarea name="editMessage" id="newMes">' + mes + '</textarea>' +
            '<button class="button" type="button" name="button" value="edit" id="edit"><i class="far fa-save fa-2x"></i></button>' +
            '</form>' +
            '</div>';

        // Добавляем форму после сообщения.
        $(parent).after(form);

        // При нажатии на кнопку сохранения в форме посылаем запрос на сохранение данных.
        $('#edit').click(function() {

            // Получаем id сообщения а так же текст отредактированного сообщения.
            var idMes = $(parent).attr('data-idmes'),
                newMes = $('#newMes').val();

            $.ajax({
                url: '/admin/feedback/editmessage',
                type: 'post',
                data: {
                    id: idMes,
                    message: newMes
                },

                // Если все прошло успешно, то закрываем форму редактирования и обновляем текст сообщения, иначе вместо формы редактирования выводим ошибку.
                success: function(response) {
                    var data = JSON.parse(response);

                    if (data.result === 'success') {

                        $('.form-edit').remove();

                        $(parent).find('p').text(newMes);

                    } else {

                        $('.form-edit').remove();

                        var error = '<div class="form-edit text">' +
                            '<p>' + data.msg + '</p>' +
                            '</div>';

                        $(parent).after(error);

                        setTimeout(function() {
                            $('.form-edit').remove();
                        }, 1500);

                    }
                },

                error: function(response) {
                    $('.form-edit').remove();

                    var error = '<div class="form-edit text">' +
                        '<p>Error!</p>' +
                        '</div>';

                    $(parent).after(error);

                    setTimeout(function() {
                        $('.form-edit').remove();
                    }, 1000);
                }

            });

        });
    }

});

$(document).ready(function() {

    // Оформление скрола.
    $("#messages").niceScroll();

});