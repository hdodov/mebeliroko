<!DOCTYPE html>
<html>
<head>
    <?= snippet('_head'); ?>
</head>
<body vocab="http://schema.org/">
    <?= snippet('header'); ?>

    <main class="container page-about">
        <div class="page-head">
            <h1 class="title"><?= $page->title(); ?></h1>
        </div>

        <div class="google-map"></div>
    </main>

    <?= snippet('_body', array(
        'loadMap' => array(
            'lat' => '42.8441726',
            'lng' => '23.1478951',
            'zoom' => '16'
        )
    )); ?>
</body>
</html>