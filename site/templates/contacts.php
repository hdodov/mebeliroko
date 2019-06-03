<!DOCTYPE html>
<html>
<head>
    <?= snippet('_head'); ?>
    <?php $lang = $site->language()->code() ?? 'en' ?>
    <script src="https://www.google.com/recaptcha/api.js?hl=<?= $lang ?>" async defer></script>
</head>
<body class="contacts" vocab="http://schema.org/">
    <?= snippet('header'); ?>

    <main class="container">
        <div class="page-head">
            <h1 class="title"><?= $page->title(); ?></h1>
        </div>

        <div class="row row-contacts align-items-center">
            <?php if ($hasLinks): ?>
                <div class="col-lg-4 offset-lg-1">
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
            <?php endif; ?>

            <div class="col-lg-6 <?= r(!$hasLinks, 'offset-lg-3'); ?>">
                <form class="ajax-form" action="message" method="post">
                    <div class="input-row">
                        <input class="form-control" type="text" name="name" placeholder="<?= l::get('form.name'); ?>">
                        <input class="form-control" type="email" name="email" placeholder="<?= l::get('form.email'); ?>">
                    </div>
                    
                    <textarea class="form-control" name="message" placeholder="<?= l::get('form.message'); ?>"></textarea>
                    
                    <div class="g-recaptcha" data-sitekey="6Lf-0aYUAAAAAA5NDkYbYPY7uArDUN56gSG5zh5G"></div>

                    <button type="submit">
                        <div class="button-text">
                            <?= l::get('form.submit'); ?>
                        </div>

                        <div class="when-success">
                            <i class="fa fa-check"></i>
                        </div>

                        <div class="when-waiting">
                            <i class="spinner">
                                <svg class="circular" viewBox="25 25 50 50">
                                    <circle class="path" cx="50" cy="50" r="20" fill="none"/>
                                </svg>
                            </i>
                        </div>
                        
                        <div class="when-error">
                            <i class="fa fa-times"></i>
                        </div>
                    </button>
                </form>
            </div>
        </div> <!-- .row -->

        <div class="google-map" data-map='<?= json_encode($page->location()->yaml(), JSON_NUMERIC_CHECK); ?>'></div>
    </main>

    <?= snippet('_body', array(
        'loadMap' => true
    )); ?>
</body>
</html>