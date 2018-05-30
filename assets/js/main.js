(function () {
    var elem = document.querySelector('.masonry');

    if (elem) {
        var msnry = new Masonry(elem, {
            itemSelector: '.image',
            percentPosition: true
        });
    } 
})();