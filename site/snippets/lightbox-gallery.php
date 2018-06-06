<?php
    switch ($type) {
        case 'large':
            $thumbnailOptions = array('width' => 220);
            break;

        case 'medium':
            $thumbnailOptions = array('width' => 350);
            break;
        
        default:
            $thumbnailOptions = array('width' => 350);
            break;
    }
?>

<?php if (count($images) > 0): ?>
    <div class="masonry-grid-wrapper">
        <div class="masonry-grid gallery <?= r(!empty($type), $type); ?>" typeof="ImageGallery">
            <?php foreach ($images as $image): ?>
                <figure class="masonry-item-wrapper" property="associatedMedia" typeof="ImageObject">
                    <a
                        class="masonry-item"
                        href="<?= $image->url(); ?>"
                        property="contentUrl"
                        data-width="<?= $image->width(); ?>"
                        data-height="<?= $image->height(); ?>"
                    >
                        <img
                            src="<?= thumb($image, $thumbnailOptions)->url(); ?>"
                            property="thumbnailUrl"
                            alt="<?= $image->caption(); ?>"
                        >
                    </a>
                </figure>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>