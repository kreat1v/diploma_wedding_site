// Подгрузка сообщений.
// Стартовое число для запроса - позиция, с которой будут извлекаться данные.
var startLimit = 3;

// Функция подгрузки сообщений.
function scrollalert() {

    // Получаем данные прокрутки.
    var scrolltop = $('#messages').prop('scrollTop'),
        scrollheight = $('#messages').prop('scrollHeight'),
        windowheight = $('#messages').prop('clientHeight'),
        scrolloffset = 20,
        idUser = $('#messages').attr('data-idus');

    // Если блок прокручен до конца - подгружаем данные.
    if (scrolltop >= (scrollheight - (windowheight + scrolloffset))) {

        $.ajax({
            url: '/admin/feedback/getMessages',
            type: 'post',
            data: {
                id: idUser,
                start: startLimit,
                limit: 3
            },

            success: function(response) {
                var data = JSON.parse(response),
                    mes = '';

                startLimit = startLimit + 3;

                // Распредялем сообщения на админские и юзера.
                data.data.map(function(element) {
                    if (typeof element['admin'] === "undefined") {
                        mes += '<div class="mes-user text">' +
                            '<div class="avt"><img src="' + data.avatar + '"></div>' +
                            '<div><span>User, ' + element.date + '</span><p>' + element.message + '</p></div>' +
                            '</div>';
                    } else {
                        mes += '<div class="mes-admin text" data-idmes="' + element.id + '">' +
                            '<div class="action">' +
                            '<div class="edit"><i class="fas fa-edit"></i></div>' +
                            '<div class="delete"><i class="fas fa-times"></i></div>' +
                            '</div>' +
                            '<div><span>Admin, ' + element.date + '</span><p>' + element.message + '</p></div>' +
                            '<div class="avt"><img src="' + data.adminAvatar + '"></div>' +
                            '</div>';
                    }
                });

                // Добавляем новую партию сообщений.
                $('#messages').append(mes);
            }
        });

    }

    // Устанавливаем setTimeout, чтобы периодически проверять положение ползунка, чтобы, при необходимости, извлечь новые элементы.
    setTimeout('scrollalert();', 1500);
}

// Редактирование сообщений.
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

            // Если отредактированное сообщение пустое, то при нажатии на кнопку сохранения ничего не происходит.
            if (newMes == '') {
                return false;
            }

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

// Удаление сообщений.
// Запускаем функцию удаления сообщения при клике на соответствующую кнопку.
$('.delete').click(function() {

    var context = this;

    // Закрываем форму редактирования, если они открыты.
    $('.form-edit').remove();

    // Запускаем моальное окно с вопросом.
    $('.modal').fadeIn();

    // Если нажимают ок - удаляем сообщение.
    $('#modal-yes').click(function() {

        $('.modal').fadeOut();

        var parent = $(context).parents('.mes-admin'),
            idMes = $(parent).attr('data-idmes');

        $.ajax({
            url: '/admin/feedback/deletemessage',
            type: 'post',
            data: {
                id: idMes
            },

            // Если все прошло успешно, то удаляем сообщение, иначе выводим ошибку.
            success: function(response) {
                var data = JSON.parse(response);

                if (data.result === 'success') {

                    $(parent).remove();

                } else {

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

    // Если закрывают модальное окно - то ничего не происходит.
    $('#modal-no').click(function() {

        $('.modal').fadeOut();

    });

});

$(document).ready(function() {

    // Оформление скрола.
    $("#messages").niceScroll();

    // Запускаем нашу функцию подгрузки сообщений.
    scrollalert();

});