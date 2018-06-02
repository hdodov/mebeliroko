$(function () {
     $('.masonry-grid').each(function (i, grid) {
        savvior.init('.masonry-grid', {
            "screen and (max-width: 767px)": {
                columns: 2,
                columnClasses: ['masonry-column']
            },
            "screen and (min-width: 768px)": {
                columns: 3,
                columnClasses: ['masonry-column']
            },
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