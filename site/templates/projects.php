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

    <main class="container-wrapper">
        <div class="container">
            <div class="container-content">
                <div class="page-head">
                    <h1 class="title"><?= $page->title(); ?></h1>

                    <?= snippet('tagcloud', array(
                        'tags' => $availableTags,
                        'pageUrl' => $page->url(),
                        'activeTags' => explode(',', $filterTags)
                    )); ?>
                </div>

                <div class="row items-row justify-content-center">
                    <?php foreach ($visibleProjects as $project): ?>
                        <?php
                            $coverUrl = $project->images()->sortBy('sort', 'asc')->first();
                            if ($coverUrl) {
                                $coverUrl = thumb($coverUrl, array('width' => 600, 'height' => 600))->url();
                            }
                        ?>

                        <div class="col-4">
                            <div class="ratio-box tag-box" style="background-image: <?= !empty($coverUrl) ? "url($coverUrl)" : 'none'; ?>;">
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
        </div>
    </main>
</body>
</html>