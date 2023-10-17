<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Classroom $model */

$this->title = 'Paparan: ' . $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="classroom-view" style="margin-top:30px;">

    <h1><?= Html::encode('Paparan Kelas') ?></h1>

    <p>
        <?= Html::a('Kemaskini', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Adakah anda pasti mahu memadamkan pengguna ini?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Kembali', ['classroom/index'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'agerequirement',
            'name',
        ],
    ]) ?>

</div>
