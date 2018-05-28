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

    <div class="container">
        <div class="row">
            <?php foreach ($tags as $tag): ?>
                <div class="col-4">
                    <a href="<?= $tag['url']; ?>">
                        <h2><?= $tag['title']; ?></h2>

                        <?php if ($tag['cover']): ?>
                            <img
                                src="<?= thumb($tag['cover'], array('width' => 300, 'height' => 300))->url(); ?>"
                                alt="<?= $tag['cover']->caption(); ?>"
                            >
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>