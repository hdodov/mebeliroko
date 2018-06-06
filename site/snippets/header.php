<?php
    $logo = $site->image($site->logo());
    $copyright = $site->copyright();

    if (!empty($logo)) {
        $logoThumb = thumb($logo, array('width' => 600));
        $logoUrl = $logoThumb->url();
    }
?>

<header>
    <div class="header-top">
        <?php if ($logo): ?>
            <a class="logo-container" href="<?= $site->language()->url(); ?>">
                <img src="<?= $logoUrl; ?>" alt="<?= $logo->caption(); ?>">
            </a>
        <?php else: ?>
            <h1><?= $site->name(); ?></h1>
        <?php endif; ?>

        <button class="mobile-button hamburger hamburger--slider-r" type="button" aria-label="Menu" aria-controls="navigation">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
    </div>

    <div class="header-content">
        <nav role="navigation">
            <ul>
                <?php foreach ($pages->visible() as $page): ?>
                    <?php
                        if ($page->template() == 'projects') {
                            continue;
                        }
                    ?>

                    <li class="<?= r($page->isActive(), 'is-active'); ?>">
                        <a href="<?= $page->url(); ?>"><?= $page->title()->html(); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div class="languages-container">
            <?= snippet('language-switch'); ?>
        </div>
    </div>
</header>