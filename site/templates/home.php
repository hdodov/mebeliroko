<!DOCTYPE html>
<html>
<head>
    <?= snippet('_head'); ?>
</head>
<body>
    <?= snippet('header'); ?>

    <main class="container">
        <div class="masonry-grid link-grid">
            <?php foreach ($tags as $tag): ?>
                <?php $coverUrl = ($tag['cover']) ? thumb($tag['cover'], array('width' => 600, 'height' => 600))->url() : null; ?>

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