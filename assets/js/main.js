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

$('.mobile-button').click(function () {
    $(this).toggleClass('is-active');
});