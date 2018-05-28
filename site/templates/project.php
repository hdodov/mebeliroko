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

    <nav class="breadcrumb" role="navigation">
      <ul>
        <?php foreach($site->breadcrumb() as $crumb): ?>
        <li>
          <a href="<?= $crumb->url() ?>">
            <?= html($crumb->title()) ?>
          </a>
        </li>
        <?php endforeach ?>
      </ul>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1><?= $page->title(); ?></h1>
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