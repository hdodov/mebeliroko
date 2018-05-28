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

    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                    foreach ($pages->get('home')->children() as $child) {
                        echo $child->title();
                        echo '<br>';
                        echo $child->tags();
                        echo '<br>';

                        echo '<pre>';
                        var_dump($child->tags());

                        $plucked = $pages->get('home')->children()->pluck('tags', ',');
                        var_dump($plucked);

                        foreach ($plucked as $tag) {
                            echo '<a href="' . url('projects/' . url::paramsToString(['таг' => $tag])) . '">' . $tag . '</a>';
                        }
                        
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>