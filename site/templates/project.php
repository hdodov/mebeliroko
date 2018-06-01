<!DOCTYPE html>
<html>
<head>
    <title><?= $page->title(); ?> &middot; <?= $site->title(); ?></title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&subset=cyrillic" rel="stylesheet">
    <?= css('assets/node_modules/bootstrap/dist/css/bootstrap-reboot.min.css'); ?>
    <?= css('assets/node_modules/bootstrap/dist/css/bootstrap-grid.min.css'); ?>
    <?= css('assets/css/style.css'); ?>

    <?= css('assets/node_modules/photoswipe/dist/photoswipe.css'); ?>
    <?= css('assets/node_modules/photoswipe/dist/default-skin/default-skin.css'); ?>
</head>
<body vocab="http://schema.org/">
    <?= snippet('header'); ?>

    <main class="container">
        <div class="page-head">
            <h1 class="title"><?= $page->title(); ?></h1>

            <?php if (!empty($projectTags)): ?>
                <?= snippet('tagcloud', array(
                    'tags' => $projectTags,
                    'pageUrl' => $page->parent()->url(),
                    'activeTags' => array()
                )); ?>
            <?php endif; ?>
        </div>

        <?php if ($mainContent): ?>
            <div class="page-text">
                <?= kirbytext($mainContent); ?>
            </div>
        <?php endif; ?>

        <div class="masonry-grid gallery" typeof="ImageGallery">
            <?php foreach ($page->images()->sortBy('sort', 'asc') as $image): ?>
                <div class="masonry-item" property="associatedMedia" typeof="ImageObject">
                    <figure class="masonry-item-content">
                        <a
                            href="<?= $image->url(); ?>"
                            property="contentUrl"
                            data-width="<?= $image->width(); ?>"
                            data-height="<?= $image->height(); ?>"
                        >
                            <img
                                src="<?= thumb($image, array('width' => 400, 'height' => 400))->url(); ?>"
                                property="thumbnail"
                                alt="<?= $image->caption(); ?>"
                            >
                        </a>
                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <?= snippet('photoswipe'); ?>

    <?= js('assets/node_modules/masonry-layout/dist/masonry.pkgd.js'); ?>
    <?= js('assets/node_modules/photoswipe/dist/photoswipe.min.js'); ?>
    <?= js('assets/node_modules/photoswipe/dist/photoswipe-ui-default.min.js'); ?>
    <?= js('assets/node_modules/jquery/dist/jquery.slim.min.js'); ?>

    <?= js('assets/js/jquery-roccoGallery.js'); ?>
    <?= js('assets/js/main.js'); ?>
</body>
</html>