<nav class="tag-cloud">
    <ul><!--
        <?php foreach ($tags as $tag): ?>
            <?php
                $tagUrl = $pageUrl . '/';
                $tagActive = in_array($tag, $activeTags);

                if (!$tagActive) {
                    $tagUrl .= url::paramsToString(['tag' => $tag]);
                }
            ?>
         --><li class="<?= r($tagActive, 'is-active'); ?>">
                <a href="<?= url($tagUrl); ?>"><?= $tag; ?></a>
            </li><!--
        <?php endforeach; ?>
 --></ul>
</nav>