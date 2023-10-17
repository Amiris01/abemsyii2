<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Paparan: ' . $model->username;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view" style="margin-top:30px;">

    <h1><?= Html::encode('Paparan Pengguna') ?></h1>

    <p>
        <?= Html::a('Kemaskini', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Adakah anda pasti mahu memadamkan pengguna ini?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Kembali', ['user/index'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'attribute' => 'id',
            'label' => 'ID', 
        ],
        [
            'attribute' => 'username',
            'label' => 'Nama Pengguna',
        ],
        [
            'attribute' => 'password',
            'visible' => false,  
        ],
        [
            'attribute' => 'authKey',
            'visible' => false, 
        ],
        [
            'attribute' => 'accessToken',
            'visible' => false, 
        ],
        [
            'attribute' => 'status',
            'value' => function ($model) {
                return $model->status == 10 ? 'Aktif' : 'Tidak Aktif';
            },
        ],
        [
            'attribute' => 'role',
            'label' => 'Peranan',
            'value' => function ($model) {
                $roleLabels = [
                    'admin' => 'Admin',
                    'student' => 'Pelajar',
                    'teacher' => 'Guru',
                ];

                return isset($roleLabels[$model->role]) ? $roleLabels[$model->role] : ucfirst($model->role);
            },
        ],
        [
            'attribute' => 'created_at',
            'label' => 'Tarikh Ciptaan', 
        ],
    ],
]) ?>


</div>
