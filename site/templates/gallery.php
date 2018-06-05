<!DOCTYPE html>
<html>
<head>
    <?= snippet('_head'); ?>
</head>
<body vocab="http://schema.org/">
    <?= snippet('header'); ?>

    <main class="container">
        <div class="page-head">
            <h1 class="title"><?= $page->title(); ?></h1>
        </div>

        <div class="masonry-grid-wrapper">
            <div class="masonry-grid gallery large" typeof="ImageGallery">
                <?php foreach ($allImages as $image): ?>
                    <div class="masonry-item-wrapper">
                        <figure class="masonry-item" property="associatedMedia" typeof="ImageObject">
                            <a
                                href="<?= $image->url(); ?>"
                                property="contentUrl"
                                data-width="<?= $image->width(); ?>"
                                data-height="<?= $image->height(); ?>"
                            >
                                <img
                                    src="<?= thumb($image, array('width' => 220))->url(); ?>"
                                    property="thumbnail"
                                    alt="<?= $image->caption(); ?>"
                                >
                            </a>
                        </figure>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <?= snippet('_body', array(
        'loadMasonry' => true,
        'loadLightbox' => true
    )); ?>
</body>
</html>