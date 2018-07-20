// Боковой фильтр.
$('#bar-filter').click(function() {

    // Показываем меню.
    $('.sections .filter').fadeIn(500);

    // При выходе курсора из области меню скрываем его.
    $('.sections .filter').mouseleave(function() {

        $('.sections .filter').fadeOut(300);

    });

    // Скрываем меню по клику не в области открытого меню.
    $(document).mouseup(function(element) {

        var div = $(".sections .filter");

        if (!div.is(element.target) && div.has(element.target).length === 0 && div.css('display') === 'block') {

            div.fadeOut(300);

        }

    });

    // Скрываем меню при клике на крестик.
    $('#close-filter').click(function() {

        $('.sections .filter').fadeOut(300);

    });

});



$(document).ready(function() {

    // Получаем GET строку, а так же устанаваливаем минимальные и максимальные значения слайдера.
    var str = window.location.search,
        minStart = 0,
        maxFinish = $('.price').attr('data-max'),
        min = minStart,
        max = maxFinish;

    // Если есть GET-параметр, то берем минимальные значения слайдера из value полей.
    if (str.indexOf('price') + 1) {

        min = +$("#min").val();
        max = +$("#max").val();

    }

    // устаналиваем слайдер
    $("#slider-range").slider({
        range: true,
        min: minStart,
        max: maxFinish,
        values: [min, max],
        slide: function(event, ui) {
            $("#min").val(ui.values[0]);
            $("#max").val(ui.values[1]);
        }
    });

    $("#min").val($("#slider-range").slider("values", 0));
    $("#max").val($("#slider-range").slider("values", 1));

    // действия при вводе значений на прямую в input
    $('#min').unbind().change(function() {

        if (+$("#min").val() > +$("#max").val() ||
            +$("#min").val() < 0) {

            $("#min").val(min);

        } else {

            $("#slider-range").slider("option", "values", [+$("#min").val(), +$("#max").val()]);
        }


    });

    $('#max').unbind().change(function() {

        if (+$("#max").val() < +$("#min").val() ||
            +$("#max").val() > maxFinish) {

            $("#max").val(max);

        } else {

            $("#slider-range").slider("option", "values", [+$("#min").val(), +$("#max").val()]);

        }

    });

    // действия при нажатии кнопки формы
    $('#filter').submit(function() {

        // получаем все значения полей брэнда
        var brand = $('div.brands input:checked');
        // и объединяем их
        if (!brand.length) {

            $('#brand').remove();

        } else {

            $('#brand').val($.map(brand, function(e) {
                return e.value;
            }).join('-'))

        }

        // получаем все значения полей размера
        var size = $('div.size input:checked');
        // и объединяем их
        if (!size.length) {

            $('#size').remove();

        } else {

            $('#size').val($.map(size, function(e) {
                return e.value;
            }).join('-'))

        }

        // объединяем значения цен
        if (+$("#min").val() != minStart ||
            +$("#max").val() != maxFinish &&
            +$("#max").val() != 0) {

            $('#price').val(+$("#min").val() + '-' + +$("#max").val());

        } else {

            $('#price').remove();

        }
    });
});