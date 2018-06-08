$(document).ready(function() {

    // Показываем и скрываем счётчик набранного текста.
    $('#message').focusin(function() {
        $('.count').fadeIn();
    });

    $('#message').focusout(function() {
        $('.count').fadeOut();
    });

    // Максимальное количество символов.
    var maxLen = 300;
    $('.count span').text(maxLen);

    // При нажатии кнопки меняем показания счетчика.
    $('#message').keyup(function() {
        var $this = $(this);

        // Если введенное количество символов превышает максимальное, то лишнее обрезаем, а счетчик приравниваем 0.
        if ($this.val().length > maxLen) {
            $('.count span').text(0);
            $this.val($this.val().substr(0, maxLen));
        } else {
            $('.count span').text(maxLen - $this.val().length);
        }
    });

    // Если форма сообщения пустая, то по нажатии на кнопку ничего не происходит.
    $('form#message-form').submit(function() {
        if ($('#message').val() == 0) {
            return false;
        }
    });

});