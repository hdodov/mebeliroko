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

    <?= snippet('_body', array(
        'loadMasonry' => true,
        'loadLightbox' => true
    )); ?>
</body>
</html>