// Плавный переход между страницами.
$(document).ready(function() {
    $(".transition").fadeIn(300);

    $("a")
        .not('.thumbs a, .panels a, .mob-gallery a, a#nextArrow, a#prevArrow')
        .click(function(event) {
            event.preventDefault();
            linkLocation = this.href;
            $(".transition").fadeOut(300, redirectPage);
        });

    function redirectPage() {
        window.location = linkLocation;
    }
});