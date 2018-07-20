// Функция, которая инициализирует нужную галерею в зависимости от ширны экрана.
function windowSize() {
    if ($(window).width() <= '799') {

        $('.mob-gallery a').touchTouch();

    } else {

        $('.panels a').touchTouch();

    }
}

// Запускаем нашу функцию.
$(window).on('load resize', windowSize);