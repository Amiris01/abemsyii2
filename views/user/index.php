<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$username = $searchModel->username ?: '';
$role = $searchModel->role ?: '';

$this->title = 'Pengguna';
?>

<div class="user-index" style="margin-top:30px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Pengguna', ['create'], ['class' => 'btn btn-success']) ?>
        <?php echo Html::a('Jana CSV', [
    'export-csv',
    'username' => $username,
    'role' => $role,
], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'label' => 'ID', 
            ],
            [
                'attribute' => 'username',
                'label' => 'Nama Pengguna', 
            ],
            //'password',
            //'authKey',
            //'accessToken',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    $statuslabels = [
                        '10' => 'Aktif',
                        '0' => 'Tidak Aktif',
                    ];

                    return isset($statuslabels[$model->status]) ? $statuslabels[$model->status] : ucfirst($model->status);
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
            //'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
