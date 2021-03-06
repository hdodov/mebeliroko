<!DOCTYPE html>
<html>
<head>
    <?= snippet('_head'); ?>
</head>
<body>
    <?= snippet('header'); ?>

    <main class="container">
        <div class="page-head">
            <h1 class="title"><?= $pageTitle; ?></h1>
        </div>

        <div class="masonry-grid-wrapper">
            <div class="masonry-grid link-grid" data-items="<?= count($visibleProjects); ?>">
                <?php foreach ($visibleProjects as $project): ?>
                    <?php
                        $coverUrl = $project->images()->sortBy('sort', 'asc')->first();
                        if ($coverUrl) {
                            $coverUrl = thumb($coverUrl, array('width' => 600, 'height' => 600))->url();
                        }
                    ?>

                    <a class="masonry-item-wrapper item-link" href="<?= $project->url(); ?>">
                        <div class="masonry-item <?= r(!$coverUrl, 'no-image'); ?>">
                            <?php if ($coverUrl): ?>
                                <img src="<?= $coverUrl; ?>"/>
                            <?php endif; ?>
                            
                            <div class="masonry-item-content">
                                <h2 class="title"><?= $project->title(); ?></h2>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <?= snippet('_body', array(
        'loadMasonry' => true
    )); ?>
</body>
</html>