$(document).ready(function() {

    // Функция получения загруженного изображения а также его обрезки.
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            // Получаем данные загруженного изображения.
            reader.onload = function(e) {
                $('#image').attr('src', e.target.result);
                $(".cropim").attr('src', e.target.result);

                // Функция обрезки изображения.
                $(function() {
                    var image = $('.cropimage'),
                        cropwidth = image.attr('cropwidth'),
                        cropheight = image.attr('cropheight'),
                        results = image.next('.results'),
                        x = $('.cropX'),
                        y = $('.cropY'),
                        w = $('.cropW'),
                        h = $('.cropH')

                    image.cropbox({
                            width: cropwidth,
                            height: cropheight,
                            showControls: 'always'
                        }, function() {
                            var attributes = $('.cropimage').prop("attributes");
                            $(".cropim").attr('style', attributes['style'].value);
                        })
                        .on('cropbox', function(event, results, img) {
                            var attributes = $('.cropimage').prop("attributes");
                            $(".cropim").attr('style', attributes['style'].value);

                            x.val(results.cropX);
                            y.val(results.cropY);
                            w.val(results.cropW);
                            h.val(results.cropH);
                        });
                });
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    // При загрузке изображения запускаем нашу функцию.
    $("#imgInput").change(function() {
        readURL(this);
    });

});