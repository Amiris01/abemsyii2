<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Student $model */

$this->title = 'Update Student: ' . $model->name;
?>
<div class="student-update" style="margin-top:30px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
