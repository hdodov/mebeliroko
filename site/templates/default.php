<!DOCTYPE html>
<html>
<head>
    <?= snippet('_head'); ?>
</head>
<body>
    <?= snippet('header'); ?>

    <main class="container">
        <div class="page-head">
            <h1 class="title">
                <?= $page->title(); ?>
            </h1>

            <div class="text" style="text-align: center;">
                <?= kirbytext($page->text()); ?>
            </div>
        </div>
    </main>
</body>
</html>