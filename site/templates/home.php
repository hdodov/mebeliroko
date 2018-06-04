<!DOCTYPE html>
<html>
<head>
    <?= snippet('_head'); ?>
</head>
<body>
    <?= snippet('header'); ?>

    <main class="container">
        <h1 class="site-title">
            <?= $site->title(); ?>
            <?php if ($site->slogan()->value()): ?>
                <span class="hidden">&mdash;</span>
                <span class="slogan"><?= $site->slogan(); ?></span>
            <?php endif; ?>
        </h1>

        <div class="masonry-grid link-grid">
            <?php foreach ($tags as $tag): ?>
                <?php $coverUrl = ($tag['cover']) ? thumb($tag['cover'], array('width' => 340, 'height' => 500))->url() : null; ?>

                <a class="item-link" href="<?= $tag['url']; ?>">
                    <div class="masonry-item">
                        <img src="<?= $coverUrl; ?>"/>
                        
                        <div class="masonry-item-content">
                            <h2 class="title"><?= $tag['title']; ?></h2>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </main>

    <?= snippet('_body', array(
        'loadMasonry' => true
    )); ?>
</body>
</html>