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
    $('.masonry-grid').each(function (i, grid) {
        savvior.init('.masonry-grid', {
            "screen and (max-width: 767px)": {
                columns: 2,
                allowEmptyColumns: false,
                columnClasses: ['masonry-column']
            },
            "screen and (min-width: 768px)": {
                columns: 3,
                allowEmptyColumns: false,
                columnClasses: ['masonry-column']
            },
        });
    });

    window.addEventListener('savvior:setup', function (event) {
        var $element = $(event.detail && event.detail.element);
        if ($element.hasClass('gallery')) {
            $element.roccoGallery();
        }
    });

    // var elem = document.querySelector('.masonry-grid');
    
    // if (elem) {
    //     var msnry = new Masonry(elem, {
    //         itemSelector: '.masonry-item',
    //         percentPosition: true
    //     });
    // } 
})();