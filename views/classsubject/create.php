<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Classsubject $model */

$this->title = 'Create Classsubject';
$this->params['breadcrumbs'][] = ['label' => 'Classsubjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classsubject-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
