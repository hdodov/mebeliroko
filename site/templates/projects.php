<!DOCTYPE html>
<html>
<head>
    <?= snippet('_head'); ?>
</head>
<body>
    <?= snippet('header'); ?>

    <main class="container">
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
                    <div class="ratio-box wide tag-box" style="background-image: <?= !empty($coverUrl) ? "url($coverUrl)" : 'none'; ?>;">
                        <div class="wrapper">
                            <a class="content" href="<?= $project->url(); ?>">
                                <h2 class="title"><?= $project->title(); ?></h2>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <?= snippet('_body'); ?>
</body>
</html>