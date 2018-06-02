<!DOCTYPE html>
<html>
<head>
    <?= snippet('_head'); ?>
</head>
<body>
    <?= snippet('header'); ?>

    <div class="container-wrapper center">
        <div class="container-wrapper-inner">
            <main class="container">
                <div class="row items-row">
                    <?php foreach ($tags as $tag): ?>
                        <?php $coverUrl = ($tag['cover']) ? thumb($tag['cover'], array('width' => 600, 'height' => 600))->url() : null; ?>

                        <div class="col-6 col-sm-4">
                            <div class="ratio-box tag-box" style="background-image: <?= !empty($coverUrl) ? "url($coverUrl)" : 'none'; ?>;">
                                <div class="wrapper">
                                    <a class="content" href="<?= $tag['url']; ?>">
                                        <h2 class="title"><?= $tag['title']; ?></h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </main>
        </div>
    </div>

    <?= snippet('_body'); ?>
</body>
</html>