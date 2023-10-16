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
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
$this->registerCssFile('@web/css/bootstrap.css')
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/logo.png', ['alt'=>Yii::$app->name, 'style'=>'height: 60px;;']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-expand-md navbar-dark fixed-top',
            'style' => 'padding: 10px;height: 80px;background-color: green;',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => [
            ['label' => 'Laman Utama', 'url' => ['/site/index']],
            ['label' => 'Tentang Kami', 'url' => ['/site/about']],
            ['label' => 'Hubungi Kami', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest
                ? ['label' => 'Log Masuk', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Log Keluar (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-laink btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>',
                    Yii::$app->user->isGuest
                    ? ['label' => 'Daftar', 'url' => ['/site/register']]
                    : (Yii::$app->user->identity->role === 'admin'
                        ? ['label' => 'Dashboard', 'url' => ['/admin/dashboard']]
                        : (Yii::$app->user->identity->role === 'teacher'
                            ? ['label' => 'Dashboard', 'url' => ['/teacher/dashboard']]
                            : (Yii::$app->user->identity->role === 'student'
                                ? ['label' => 'Dashboard', 'url' => ['/student/dashboard']]
                                : null))),
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main" style="background-color: #7bb841;">
    <div class="container">
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
            <div class="col-md-6 text-center text-md-start">&copy; ABEMS <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end">Hak Milik Terpelihara</div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
