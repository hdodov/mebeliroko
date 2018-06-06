<?php if ($page->isHomePage()): ?>
    <title>
        <?= $site->title(); ?>
        <?php if ($site->slogan()->value()): ?>
            &ndash; <?= $site->slogan(); ?>
        <?php endif; ?>
    </title>
<?php else: ?>
    <title><?= $page->title(); ?> &middot; <?= $site->title(); ?></title>
<?php endif; ?>

<?php foreach ($site->languages() as $language): ?>
    <link rel="alternate" hreflang="<?= html($language->code()); ?>" href="<?= $page->url($language->code()); ?>" />
<?php endforeach ?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&subset=cyrillic" rel="stylesheet">
<?= css('assets/node_modules/bootstrap/dist/css/bootstrap-reboot.min.css'); ?>
<?= css('assets/node_modules/bootstrap/dist/css/bootstrap-grid.min.css'); ?>
<?= css('assets/css/style.css'); ?>