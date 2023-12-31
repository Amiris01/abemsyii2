<?php

use app\models\Teacher;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\TeacherSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Guru';
?>
<div class="teacher-index" style="margin-top:30px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Guru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'userid',
            'name',
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
            'email:email',
            'contact_num',
            //'profile_pic',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Teacher $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
