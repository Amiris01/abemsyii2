<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Tentang Kami';
?>
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
<div class="site-about">
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="content-section">
                <?= Html::img('@web/images/caroussel3.jpg', ['alt' => 'Banner 1','class' => 'img-responsive']) ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="content-section" style="display: flex;
            justify-content: space-between;">
                <div class="text-content" style="text-align: center;margin-top:85px;">
                    <h2 class="mb-4">Falsafah Pendidikan Al Baghdadi</h2>
                    <p class="mb-4">Pendidikan Al-Quran Prasekolah Al Baghdadi adalah satu usaha berterusan ke arah membina generasi yang mampu mempelajari Al-Quran seawal usia empat tahun dengan meningkatkan keupayaan membaca, menghafaz dan menulis ayat-ayat Al-Quran dengan teknik yang inovatif, kreatif dan menyeronokkan di samping kecemerlangan dalam bidang akademik.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="content-section" style="display: flex;
            justify-content: space-between;">
                <div class="text-content" style="text-align: center;margin-top:85px;">
                    <h2 class="mb-4">Latar Belakang Al Baghdadi</h2>
                    <p class="mb-4">
                        Sejak ditubuhkan pada tahun 2009, Al Baghdadi Method Sdn Bhd telah mempunyai 639 pusat pembelajaran al-Quran Teknik Al Baghdadi atau Al Baghdadi Learning Centre (ALC) diseluruh Malaysia dan menerima pengiktirafan dari The Malaysia Book of Records bagi kategori The Largest Quranic Learning Centre Chain in Malaysia dalam tempoh 19 bulan.

                        Wujud keperluan Al Baghdadi memperkenalkan Pusat Perkembangan Potensi Kanak-kanak al-Quran pertama di Malaysia yang berkonsepkan al-Quran sepenuhnya dengan menggunakan Teknik Al Baghdadi sebagai asas kepada pembelajaran di pusat tersebut yang dikenali sebagai Al Baghdadi Playtime Centre (APC). APC juga bertindak sebagai Pusat Tuisyen al-Quran bagi kanak-kanak berusia 4 hingga 6 tahun.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="content-section">
                <?= Html::img('@web/images/caroussel4.png', ['alt' => 'Banner 1','class' => 'img-responsive']) ?>
            </div>
        </div>
    </div>
</div>
</div>
