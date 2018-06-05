<?php

echo js('assets/node_modules/jquery/dist/jquery.slim.min.js');

if (!empty($loadMasonry)) {
    echo js('assets/node_modules/masonry-layout/dist/masonry.pkgd.min.js');
}

if (!empty($loadLightbox)) {
    echo snippet('photoswipe');
    echo css('assets/node_modules/photoswipe/dist/photoswipe.css');
    echo css('assets/node_modules/photoswipe/dist/default-skin/default-skin.css');

    echo js('assets/node_modules/photoswipe/dist/photoswipe.min.js');
    echo js('assets/node_modules/photoswipe/dist/photoswipe-ui-default.min.js');
    echo js('assets/js/jquery-roccoGallery.js');
}

echo js('assets/js/main.js');