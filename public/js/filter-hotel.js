// Устанавливаем предел минимального значеня ценового диапазона.
minStart = 0;

// Устанавливаем минимальное значение слайдера.
min = minStart;

// Устанавливаем предел максимального значения ценового диапазона.
$.ajax({
    url: '/hotel/priceFilter',
    type: 'post',

    success: function(response) {
        var maxVal = JSON.parse(response);
        maxFinish = maxVal.max;
        // Устанавливаем максимальное значение слайдера.
        max = maxFinish;
    }
});

$(document).ready(function() {

    // Если есть GET-параметр, то берем минимальные значения слайдера из value полей.
    var str = window.location.search;
    if (str.indexOf('price') + 1) {

        min = +$("#min").val();
        max = +$("#max").val();

    }

    // Устаналиваем слайдер.
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

    // Действия при вводе значений на прямую в input.
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

    // Действия при нажатии кнопки формы.
    $('#filter-hotel').submit(function() {

        // Получаем все значения полей брэнда.
        var brand = $('div.brands input:checked');

        // И объединяем их.
        if (!brand.length) {

            $('#brand').remove();

        } else {

            $('#brand').val($.map(brand, function(e) {
                return e.value;
            }).join('-'))

        }

        // Объединяем значения цен.
        if (+$("#min").val() != minStart ||
            +$("#max").val() != maxFinish &&
            +$("#max").val() != 0) {

            $('#price').val(+$("#min").val() + '-' + +$("#max").val());

        } else {

            $('#price').remove();

        }
    });
});