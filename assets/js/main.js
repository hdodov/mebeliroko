$(function () {
    $('.masonry-grid').each(function (i, grid) {
        new Masonry(grid, {
            itemSelector: '.masonry-item',
            percentPosition: true
        });
    });

    var $galleries = $('.gallery');
    if ($galleries.length) {
        $galleries.roccoGallery();
    }
});

(function () {
    var $button = $('.mobile-button')
    ,   $header = $button.closest('header')
    ,   $body = $(document.body);

    $button.on('click', function () {
        $button.toggleClass('is-active');
        $header.toggleClass('is-active');
        $body.toggleClass('mobile-nav-active');
    });
})();