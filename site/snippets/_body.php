<?= js('assets/node_modules/jquery/dist/jquery.slim.min.js'); ?>

<?php if (!empty($loadMasonry)): ?>
    <?= js('assets/node_modules/enquire.js/dist/enquire.min.js'); ?>
    <?= js('assets/node_modules/savvior/dist/savvior.js'); ?>
<?php endif; ?>

<?php if (!empty($loadLightbox)): ?>
    <?= snippet('photoswipe'); ?>
    <?= css('assets/node_modules/photoswipe/dist/photoswipe.css'); ?>
    <?= css('assets/node_modules/photoswipe/dist/default-skin/default-skin.css'); ?>

    <?= js('assets/node_modules/photoswipe/dist/photoswipe.min.js'); ?>
    <?= js('assets/node_modules/photoswipe/dist/photoswipe-ui-default.min.js'); ?>
    <?= js('assets/js/jquery-roccoGallery.js'); ?>
<?php endif; ?>

<?= js('assets/js/main.js'); ?>