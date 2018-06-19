// устанавливаем предел минимального значеня ценового диапазона
minStart = 0;

// устанавливаем минимальное значение слайдера
min = minStart;

// устанавливаем предел максимального значения ценового диапазона
$.ajax({
    url: '/cake/priceFilter',
    type: 'post',

    success: function(response) {
        var maxVal = JSON.parse(response);
        maxFinish = maxVal.max;
        // устанавливаем максимальное значение слайдера
        max = maxFinish;
    }
});

$(document).ready(function() {

    // если есть GET-параметр, то берем минимальные значения слайдера из value полей
    var str = window.location.search;
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
    $('#filter-cake').submit(function() {

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