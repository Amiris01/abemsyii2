<?php

use app\models\Student;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\StudentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pelajar';
?>
<div class="student-index" style="margin-top:30px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Pelajar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' =>'id',
                'label' => 'ID',
            ],
            //'userid',
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
                    $statuslabels = [
                        '10' => 'Aktif',
                        '0' => 'Tidak Aktif',
                    ];

                    return isset($statuslabels[$model->status]) ? $statuslabels[$model->status] : ucfirst($model->status);
                },
            ],
            [
                'attribute' => 'parent_name',
                'label' => 'Nama Penjaga',
            ],
            //'address',
            [
                'attribute' => 'parent_contact',
                'label' => 'No. Telefon Penjaga'
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Student $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
