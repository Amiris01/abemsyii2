<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Teacher $model */

$this->title = 'Paparan: ' . $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="teacher-view" style="margin-top:30px;">

    <h1><?= Html::encode('Paparan Guru') ?></h1>

    <p>
        <?= Html::a('Kemaskini', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Adakah anda pasti mahu memadamkan pengguna ini?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Kembali', ['teacher/index'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <img src="<?= Yii::$app->request->baseUrl ?>/<?= $model->profile_pic ?>" alt="Uploaded Image" style="display: block; margin: 0 auto; max-width: 200px; max-height: 200px; margin-bottom:30px; margin-top:30px;">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'userid',
                'visible' => false,
            ],
            'name',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->status == 10 ? 'Aktif' : 'Tidak Aktif';
                },
            ],
            'email:email',
            'contact_num',
            [
                'attribute' => 'profile_pic',
                'visible' => false,
            ],
        ],
    ]) ?>

</div>
