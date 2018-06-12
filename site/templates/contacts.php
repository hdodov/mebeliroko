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

            <div class="row align-items-center page-content">
                <div class="col-sm-6">
                    <ul class="icon-links-list">
                        <?php foreach ($links as $link): ?>
                            <?php
                                switch ($link['type']) {
                                    case 'tel': $icon = 'fa fa-phone'; break;
                                    case 'email': $icon = 'fa fa-envelope'; break;
                                    default:
                                        switch ($link['hostname']) {
                                            case 'facebook': $icon = 'fab fa-facebook-f'; break;  
                                            default: $icon = "fab fa-{$link['hostname']}"; break;
                                        }
                                }
                            ?>

                            <li>
                                <a<?= $link['attrs']; ?>>
                                    <div class="icon-container">
                                        <i class="<?= $icon; ?>"></i>
                                    </div>

                                    <div class="content">
                                        <?= $link['text']; ?>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="col-sm-6">
                    <form action="message" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" type="text" name="name" placeholder="<?= l::get('form.name'); ?>" required>
                            </div>

                            <div class="col-lg-6">
                                <input class="form-control" type="email" name="email" placeholder="<?= l::get('form.email'); ?>" required>
                            </div>
                        </div>
                        
                        <textarea class="form-control" name="message" placeholder="<?= l::get('form.message'); ?>" required></textarea>

                        <button class="is-success">
                            <div class="button-text">
                                <?= l::get('form.submit'); ?>
                            </div>

                            <div class="when-success">
                                <i class="fa fa-check"></i>
                            </div>
                            
                            <div class="when-error">
                                <i class="fa fa-times"></i>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="google-map" data-map='<?= json_encode($page->location()->yaml(), JSON_NUMERIC_CHECK); ?>'></div>
    </main>

    <?= snippet('_body', array(
        'loadMap' => true
    )); ?>
</body>
</html>