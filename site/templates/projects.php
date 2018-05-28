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

    <main class="container-wrapper items-wrapper">
        <div class="container">
            <h1 class="title"><?= !empty($filterTags) ? $filterTags : $page->title(); ?></h1>

            <div class="row justify-content-center">
                <?php foreach ($projects as $project): ?>
                    <div class="col-4">
                        <div class="ratio-box tag-box">
                            <div class="wrapper">
                                <a class="content" href="<?= $project->url(); ?>">
                                    <h2><?= $project->title(); ?></h2>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</body>
</html>