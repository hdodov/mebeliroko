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

(function () {
    var $galleries = $('.gallery');

    if ($galleries.length) {
        $galleries.roccoGallery();
    }
})();

$(window).on('load', function () {
    var $grids = $('.masonry-grid');

    if ($grids.length) {
        $grids.masonry({
            itemSelector: '.masonry-item-wrapper',
            transitionDuration: 0,
            percentPosition: true
        }).addClass('is-laid');
    }
});