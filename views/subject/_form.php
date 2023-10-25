<?php

use app\models\Teacher;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$teacher = Teacher::find()
    ->select(['name'])
    ->indexBy('id')
    ->column();

/** @var yii\web\View $this */
/** @var app\models\Subject $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="subject-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'teacherid')->dropDownList($teacher, ['prompt' => 'Pilih Guru']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image', [
    'template' => "{label}\n<div class='file-input-container'>{input}</div>\n{hint}\n{error}"
])->fileInput(['style' => 'border: 1px solid black; padding: 10px;']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Kembali', ['subject/index'], ['class' => 'btn btn-secondary']) ?>
        <?= Html::resetButton('Kosongkan', ['class' => 'btn btn-danger']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
