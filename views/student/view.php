<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Student $model */

$this->title = 'Paparan: ' . $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="student-view" style="margin-top:30px;">

    <h1><?= Html::encode('Paparan Pelajar') ?></h1>

    <p>
        <?= Html::a('Kemaskini', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Adakah anda pasti mahu memadamkan pengguna ini?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Kembali', ['student/index'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <img src="<?= Yii::$app->request->baseUrl ?>/<?= $model->profile_pic ?>" alt="Uploaded Image" style="display: block; margin: 0 auto; max-width: 200px; max-height: 200px; margin-bottom:30px; margin-top:30px;">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id',
                'label' => 'ID',
            ],
            [
                'attribute' => 'userid',
                'label' => 'ID Pengguna',
                'visible' => false, 
            ],
            [
                'attribute' => 'name',
                'label' => 'Nama',
            ],
            [
                'attribute' => 'age',
                'label' => 'Umur',
            ],
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->status == 10 ? 'Aktif' : 'Tidak Aktif';
                },
            ],
            [
                'attribute' => 'parent_name',
                'label' => 'Nama Penjaga',
            ],
            [
                'attribute' => 'address',
                'label' => 'Alamat',
            ],
            [
                'attribute' => 'parent_contact',
                'label' => 'No. Telefon Penjaga',
            ],
        ],
    ]) ?>

</div>
