<?php
    $logo = $site->image($site->logo());
    $copyright = $site->copyright();

    if (!empty($logo)) {
        $logoThumb = thumb($logo, array('width' => 600));
        $logoUrl = $logoThumb->url();
    }
?>

<header>
    <?php if ($logo): ?>
        <div class="logo-container">
            <img src="<?= $logoUrl; ?>" alt="<?= $logo->caption(); ?>">
        </div>
    <?php endif; ?>

    <nav role="navigation">
        <ul>
            <?php foreach ($pages->visible() as $item): ?>
                <li class="<?= r($item->isActive(), 'is-active'); ?>">
                    <a href="<?= $item->url(); ?>"><?= $item->title()->html(); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <?php if ($copyright): ?>
        <div class="foot-container">
            <?= kirbytext($copyright); ?>
            <?= snippet('language-switch'); ?>
        </div>
    <?php endif; ?>
</header>