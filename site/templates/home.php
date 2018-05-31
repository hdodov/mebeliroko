<!DOCTYPE html>
<html>
<head>
    <title><?= $site->title(); ?></title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?= css('assets/node_modules/bootstrap/dist/css/bootstrap-reboot.min.css'); ?>
    <?= css('assets/node_modules/bootstrap/dist/css/bootstrap-grid.min.css'); ?>
    <?= css('assets/css/style.css'); ?>
</head>
<body>
    <?= snippet('header'); ?>

    <main class="container-wrapper center limited">
        <div class="container">
            <div class="container-content">
                <div class="row items-row">
                    <?php foreach ($tags as $tag): ?>
                        <?php $coverUrl = ($tag['cover']) ? thumb($tag['cover'], array('width' => 600, 'height' => 600))->url() : null; ?>

                        <div class="col-4">
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
            </div>
        </div>
    </main>
</body>
</html>