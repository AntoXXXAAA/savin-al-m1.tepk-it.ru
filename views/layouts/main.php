<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag([
    'name' => 'viewport',
    'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no'
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => $this->params['meta_description'] ?? ''
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $this->params['meta_keywords'] ?? ''
]);
// Фавиконка (comfort.ico) берётся из web/ или web/images/
$this->registerLinkTag([
    'rel'  => 'icon',
    'type' => 'image/x-icon',
    'href' => Yii::getAlias('@web/comfort.ico'),
]);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <title><?= Html::encode($this->title) ?></title>

        <style>
            body {
                font-family: Candara, sans-serif !important;
            }
        </style>

        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header id="header">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl'   => Yii::$app->homeUrl,
            'options'    => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top'],
        ]);

        $menuItems = [];

        $menuItems[] = [
            'label' => 'Карточки продукции',
            'url'   => ['/products/manufacturing']
        ];
        $menuItems[] = [
            'label' => 'Материалы товаров',
            'url'   => ['/material-type/index']
        ];
        $menuItems[] = [
            'label' => 'Типы товаров',
            'url'   => ['/product-type/index']
        ];
        $menuItems[] = [
            'label' => 'Товар в цехе',
            'url'   => ['/product-workshops/index']
        ];
        $menuItems[] = [
            'label' => 'Товары',
            'url'   => ['/products/index']
        ];
        $menuItems[] = [
            'label' => 'Типы цехов',
            'url'   => ['/workshop-type/index']
        ];
        $menuItems[] = [
            'label' => 'Цеха',
            'url'   => ['/workshops/index']
        ];

        // Теперь логиниться не нужно, но кнопка пусть будет.
        if (Yii::$app->user->isGuest) {
            $menuItems[] = [
                'label' => 'Войти',
                'url'   => ['/site/login']
            ];
        } else {
            $username = Yii::$app->user->identity->username;

            // Остальные вкладки — только не для demo
            if ($username !== 'demo') {

            }

            // Кнопка выхода
            $menuItems[] = '<li class="nav-item">'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выйти (' . Html::encode($username) . ')',
                    ['class' => 'nav-link btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';
        }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items'   => $menuItems,
        ]);

        NavBar::end();  // <-- не забываем закрыть NavBar
        ?>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container" style="padding-top: 70px;">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 bg-light">
        <div class="container">
            <div class="row text-muted">
                <div class="col-md-6 text-center text-md-start">&copy; AntoXXXAAA <?= date('Y') ?></div>
                <div class="col-md-6 text-center text-md-end">Developed by: <a href="https://github.com/AntoXXXAAA">AntoXXXAAA</a></div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>