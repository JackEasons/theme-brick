<!DOCTYPE html>
<html class="<?= $params['html_class'] ?>" lang="<?= $intl->getLocaleTag() ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= $view->render('head') ?>
        <?php $view->style('theme', 'theme:css/theme.css') ?>
        <?php $view->script('theme', 'theme:js/theme.js', ['uikit-sticky',  'uikit-lightbox']) ?>
    </head>
    <body>

        <div class="uk-container uk-container-center">
            <div class="tm-container">

                <?php if ($params['logo'] || $view->menu()->exists('main') || $view->position()->exists('navbar')) : ?>
                <div class="<?= $params['classes.navbar'] ?>" <?= $params['classes.sticky'] ?>>

                    <nav class="uk-navbar">

                        <?php if ($params['logo']) : ?>
                        <a class="uk-navbar-brand" href="<?= $view->url()->get() ?>">

                            <img class="tm-logo" src="<?= $this->escape($params['logo']) ?>" alt="">

                            <img class="tm-logo-contrast" src="<?= ($params['logo_contrast']) ? $this->escape($params['logo_contrast']) : $this->escape($params['logo']) ?>" alt="">

                        </a>
                        <?php endif ?>

                        <?php if ($view->menu()->exists('main') || $view->position()->exists('navbar')) : ?>
                        <div class="uk-navbar-flip uk-hidden-small">
                            <?= $view->menu('main', 'menu-navbar.php') ?>
                            <?= $view->position('navbar', 'position-blank.php') ?>
                        </div>
                        <?php endif ?>

                        <?php if ($view->position()->exists('offcanvas') || $view->menu()->exists('offcanvas')) : ?>
                        <div class="uk-navbar-flip uk-visible-small">
                            <a href="#offcanvas" class="uk-navbar-toggle" data-uk-offcanvas></a>
                        </div>
                        <?php endif ?>

                    </nav>

                </div>
                <?php endif ?>

                <?php if ($view->position()->exists('hero')) : ?>
                <div id="tm-hero" class="tm-hero uk-block uk-block-large uk-cover-background <?= $params['classes.hero'] ?>" <?= $params['hero_image'] ? "style=\"background-image: url('{$view->url($params['hero_image'])}');\"" : '' ?>>

                    <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                        <?= $view->position('hero', 'position-grid.php') ?>
                    </section>

                </div>
                <?php endif; ?>

                <?php if ($view->position()->exists('top')) : ?>
                <div id="tm-top" class="tm-top uk-block uk-block-muted">

                    <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                        <?= $view->position('top', 'position-grid.php') ?>
                    </section>

                </div>
                <?php endif; ?>

                <div id="tm-main" class="tm-main uk-block uk-block-default">

                    <div class="uk-grid" data-uk-grid-match data-uk-grid-margin>

                        <main class="<?= $view->position()->exists('sidebar') ? 'uk-width-medium-3-4' : 'uk-width-1-1'; ?>">
                            <?= $view->render('messages') ?>
                            <?= $view->render('content') ?>
                        </main>

                        <?php if ($view->position()->exists('sidebar')) : ?>
                        <aside class="uk-width-medium-1-4 <?= $params['sidebar_first'] ? 'uk-flex-order-first-medium' : ''; ?>">
                            <?= $view->position('sidebar', 'position-panel.php') ?>
                        </aside>
                        <?php endif ?>

                    </div>

                </div>

                <?php if ($view->position()->exists('bottom')) : ?>
                <div id="tm-bottom" class="tm-bottom uk-block uk-block-muted">

                    <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                        <?= $view->position('bottom', 'position-grid.php') ?>
                    </section>

                </div>
                <?php endif; ?>

                <?php if ($view->position()->exists('footer')) : ?>
                <div id="tm-footer" class="tm-footer uk-block-secondary uk-contrast">

                    <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                        <?= $view->position('footer', 'position-grid.php') ?>
                    </section>

                </div>
                <?php endif; ?>

            </div>
        </div>

        <?php if ($view->position()->exists('offcanvas') || $view->menu()->exists('offcanvas')) : ?>
        <div id="offcanvas" class="uk-offcanvas">
            <div class="uk-offcanvas-bar uk-offcanvas-bar-flip">

                <?php if ($view->menu()->exists('offcanvas')) : ?>
                    <?= $view->menu('offcanvas', ['class' => 'uk-nav-offcanvas']) ?>
                <?php endif ?>

                <?php if ($view->position()->exists('offcanvas')) : ?>
                    <?= $view->position('offcanvas', 'position-panel.php') ?>
                <?php endif ?>

            </div>
        </div>
        <?php endif ?>

        <?= $view->render('footer') ?>

    </body>
</html>
