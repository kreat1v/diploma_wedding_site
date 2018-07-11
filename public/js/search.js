// Анимация поиска.
var context = document.querySelector.bind(document);
var form = context('#search form');
var changeFormState = function changeFormState() {
    var input = context('input');
    form.classList.toggle('open');
    if (form.className === 'open') {
        input.focus();
    } else {
        input.value = '';
        $('#search .result').fadeOut(100);
    }
};
form.addEventListener('click', changeFormState);
form.addEventListener('submit', function(e) {
    e.preventDefault();
    changeFormState();
});

// Организация поиска.
$('#search-form').keyup(function() {

    // Получаем вводимые данные.
    var context = $(this),
        val = $(context).val();

    // Если введенная строка не пустая и если окно поиска открыто - делаем запрос, иначе скрываем результаты поиска.
    if (val && $('.open').length > 0) {

        $.ajax({
            url: '/search/searchstring',
            type: 'post',
            data: {
                string: val
            },

            success: function(response) {
                var data = JSON.parse(response),
                    str = '',
                    count = 0;

                if (data.result === 'success') {

                    // Очищаем окно результатов.
                    $('#search .result li').remove();
                    $('#search .result .all').hide();

                    // Проходимся циклов по пришедшим данным.
                    data.data.map(function(element) {

                        if (count >= 5) {
                            return false;
                        }

                        str += '<li><a href="' + element.link + '">' + element.title + '</a></li>';

                        count += 1;

                    });

                    // Если пришедший массив с результатами не пустой - покажем окно результатов.
                    if (data.data.length > 0) {

                        // Если в массиве больше 5ти результатов - покажем ссылку на все результаты.
                        if (data.data.length > 5) {

                            $('#search .result .all').show();
                            $('#search .result .all a').attr('href', data.link);

                        }

                        $('#search .result ul').append(str);
                        $('#search .result').fadeIn(100);

                    } else {

                        $('#search .result').fadeOut(100);

                    }

                } else {

                    console.log(data.msg);
                }
            },

            error: function(response) {

                console.log('Error!');

            }

        });

    } else {

        $('#search .result').fadeOut(100);

    }

});