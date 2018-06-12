$(window).on('load', function () {
    var $grids = $('.masonry-grid');

    if ($grids.length) {
        var mas = $grids.masonry({
            itemSelector: '.masonry-item-wrapper',
            transitionDuration: 0,
            percentPosition: true
        }).addClass('is-laid').masonry('layout');
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

(function () {
    var $galleries = $('.gallery');

    if ($galleries.length) {
        $galleries.roccoGallery();
    }
})();

(function () {
    $('.ajax-form').on('submit', function (e) {
        e.preventDefault();

        var $form = $(this);
        var $button = $form.find('button');

        if (!$button.hasClass('is-waiting')) {
            $button.removeClass().addClass('is-waiting');
        } else {
            return;
        }

        $.ajax({
            url: $form.attr('action'),
            method: $form.attr('method') || 'get',
            data: $form.serializeArray()
        }).always(function (data, status, state) {
            if (data) {
                if (data.status == 'success') {
                    $button.removeClass().addClass('is-success');
                    return;
                } else {
                    console.warn('Request error:', data);
                }
            } else {
                console.warn('No response data:', status, state);
            }
            
            $button.removeClass().addClass('is-error');
        });
    });
})();