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

            <?php if ($mainContent->value()): ?>
                <div class="text">
                    <?= kirbytext($mainContent); ?>
                </div>
            <?php endif; ?>
        </div>

        <?= snippet('lightbox-gallery', array(
            'images' => $page->images()->sortBy('sort', 'asc'),
            'type' => 'medium'
        )); ?>
    </main>

    <?= snippet('_body', array(
        'loadMasonry' => true,
        'loadLightbox' => true
    )); ?>
</body>
</html>