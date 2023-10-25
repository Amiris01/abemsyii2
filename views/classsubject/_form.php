<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Classsubject $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="classsubject-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'classid')->textInput() ?>

    <?= $form->field($model, 'subjectid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::resetButton('Kosongkan', ['class' => 'btn btn-danger']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
