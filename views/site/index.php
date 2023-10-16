<?php

/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'ABEMS Landing Page';
$this->registerCssFile('@web/css/bootstrap.css');
?>
<div class="site-index">

<div class="container-fluid banner-container" style="
        background-image: url('images/header.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 450px;">
    <div class="row">
        <div class="col">
        </div>
    </div>
</div>


<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="content-section">
                <?= Html::img('@web/images/al-baghdadi-playtime-sabah-profile.png', ['alt' => 'Banner 1']) ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="content-section" style="display: flex;
            justify-content: space-between;
            padding: 20px;">
                <div class="text-content" style="margin-top: 140px;
            max-width: 100%;
            text-align: center;">
                    <h2 class="mb-4">PENGAMBILAN PELAJAR SESI DISEMBER 2023</h2>
                    <p class="mb-4">Masih mencari Tadika untuk anak tersayang anda?
                        Anda masih tercari-cari tadika yang menitik beratkan pendidikan Al Quran seawalusia 4 tahun?
                        Jom sertai APC kami.</p>
                    <a href="<?= Url::to(['site/register']) ?>" class="btn btn-primary">DAFTAR</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>