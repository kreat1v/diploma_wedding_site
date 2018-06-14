// При клике на кнопку запускаем нашу функцию.
$('.sm-buttons').click(function() {

    // Получаем форму, в которой произошел клик.
    var form = $(this).parent('form');

    // Запускаем модальное окно.
    $('.modal').fadeIn();

    // Если нажимают подтверждение, запись архивируется.
    $('#modal-yes').click(function() {

        $(form).submit();

    });

    // Если закрывают модальное окно - то ничего не происходит.
    $('#modal-no').click(function() {

        $('.modal').fadeOut();

    });

});