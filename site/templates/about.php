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

        <?php if (count($teamMembers) > 0): ?>
            <div class="row team-container">
                <?php foreach ($page->members()->toStructure() as $member): ?>
                    <?php
                        $memberImage = image($member->image());
                        $memberThumbnail = thumb($memberImage, array('width' => 350));
                    ?>

                    <div class="col-sm-6 col-lg-4 team-member" typeof="Person">
                        <?php if ($memberImage): ?>
                            <div class="image-wrapper">
                                <div class="image-container">
                                    <img src="<?= $memberThumbnail->url(); ?>" alt="<?= $memberImage->caption(); ?>" property="image">
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($member->name()->value() || $member->title()->value()): ?>
                            <div class="head">
                                <?php if ($member->name()->value()): ?>
                                    <h2 class="name" property="name">
                                        <?= $member->name(); ?>
                                    </h2>
                                <?php endif; ?>

                                <?php if ($member->title()->value()): ?>
                                    <p class="title" property="jobTitle">
                                        <?= $member->title(); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($member->text()->value()): ?>
                            <div class="text" property="description">
                                <?= kirbytext($member->text()); ?>
                            </div>
                        <?php endif; ?>          
                    </div>
                <?php endforeach; ?>
            </div> <!-- .row -->
        <?php endif; ?>

        <?= snippet('lightbox-gallery', array(
            'images' => $galleryImages,
            'type' => 'small'
        )); ?>
    </main>

    <?= snippet('_body', array(
        'loadMasonry' => true,
        'loadLightbox' => true
    )); ?>
</body>
</html>