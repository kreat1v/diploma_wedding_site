var context = document.querySelector.bind(document);
var form = context('#search form');
var changeFormState = function changeFormState() {
    var input = context('input');
    form.classList.toggle('open');
    if (form.className === 'open') {
        input.focus();
    } else {
        input.value = '';
    }
};
form.addEventListener('click', changeFormState);
form.addEventListener('submit', function(e) {
    e.preventDefault();
    changeFormState();
});

$("#search").autocomplete({
    source: '/search/searchtags',
    search: function(event, ui) {
        var val = $('#search').val();
        $('#searchButton').attr('href', '/search/tags/' + val + '/1');
    },
    close: function(event, ui) {
        var val = $('#search').val();
        $('#searchButton').attr('href', '/search/tags/' + val + '/1');
    }
});