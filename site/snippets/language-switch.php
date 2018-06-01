<?php ob_start(); ?>

<ul class="languages">
    <?php foreach ($site->languages() as $language): ?>
        <li>
            <a href="<?= $page->url($language->code()); ?>"><?= $language->name(); ?></a>
        </li>
    <?php endforeach; ?>
</ul>

<?php echo preg_replace("/>(\s+)</", '><', ob_get_clean()) ?>