<!DOCTYPE html>
<html>
<head>
    <title><?= $page->title(); ?> &middot; <?= $site->title(); ?></title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?= css('assets/node_modules/bootstrap/dist/css/bootstrap-reboot.min.css'); ?>
    <?= css('assets/node_modules/bootstrap/dist/css/bootstrap-grid.min.css'); ?>
    <?= css('assets/css/style.css'); ?>
</head>
<body>
    <?= snippet('header'); ?>
    <?= snippet('breadcrumbs'); ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1><?= $page->title(); ?></h1>

                <?= snippet('tagcloud', array(
                    'tags' => explode(',', $page->tags()),
                    'pageUrl' => $page->parent()->url(),
                    'activeTags' => array()
                )); ?>

                <?= kirbytext($page->text()); ?>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php foreach ($page->images() as $image): ?>
                    <?= thumb($image, array('width' => 300, 'height' => 300)); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>