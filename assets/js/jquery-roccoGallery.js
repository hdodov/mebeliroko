(function ($) {
    var $pswp = $('.pswp');

    function thumbBounds(element) {
        var pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
            rect = element.getBoundingClientRect(); 

        return {
            x:rect.left,
            y:rect.top + pageYScroll,
            w:rect.width
        };
    }

    function openPhotoSwipe(items, imageIndex) {
        var options = {
            index: imageIndex,
            showHideOpacity: true,
            history: false,
            shareEl: false,
            getThumbBoundsFn: function (index) {
                return thumbBounds(items[index].boundsElem);
            }
        };

        new PhotoSwipe($pswp[0], PhotoSwipeUI_Default, items, options).init();
    }

    function initGallery(gallery) {
        var $gallery = $(gallery);

        var items = $gallery.children().map(function (index, child) {
            var $child = $(child)
            ,   $figure = $child.find('figure')
            ,   $anchor = $figure.find('a')
            ,   $img = $anchor.find('img');

            $figure.on('click', function () {
                openPhotoSwipe(items, index);
            });

            return {
                el: $anchor[0],
                boundsElem: $img[0],
                src: $anchor.attr('href'),
                w: $anchor.attr('data-width'),
                h: $anchor.attr('data-height'),
                title: $img.attr('alt'),
                msrc: $img.attr('src')
            };
        });
    }

    $.fn.roccoGallery = function (options) {
        return this.each(function (i, elem) {
            initGallery(elem);
        });
    };
})(jQuery);