<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Subject $model */

$this->title = 'Paparan: ' . $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="subject-view" style="margin-top:30px;">

    <h1><?= Html::encode('Paparan Subjek') ?></h1>

    <p>
        <?= Html::a('Kemaskini', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Adakah anda pasti mahu memadamkan pengguna ini?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Kembali', ['subject/index'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <img src="<?= Yii::$app->request->baseUrl ?>/<?= $model->image ?>" alt="Uploaded Image" style="display: block; margin: 0 auto; max-width: 200px; max-height: 200px; margin-bottom:30px; margin-top:30px;">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'teacherid',
                'value' => function($model) {
                    return $model->teacher->name;
                }
            ],
            'name',
            'description',
        ],
    ]) ?>

</div>
