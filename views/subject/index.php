<?php

use app\models\Subject;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\SubjectSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Subjek';
?>
<div class="subject-index" style="margin-top:30px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Subjek', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'teacherid',
                'value' => function($model) {
                    return $model->teacher->name;
                }
            ],
            'name',
            'description',
            //'image',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Subject $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
