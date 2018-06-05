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

$(function () {
    var $grids = $('.masonry-grid')
    ,   $galleries = $('.gallery');

    if ($grids.length) {
        $grids.masonry({
            itemSelector: '.masonry-item-wrapper',
            transitionDuration: 0,
            percentPosition: true
        }).addClass('is-laid');
    }

    if ($galleries.length) {
        $galleries.roccoGallery();
    }
});