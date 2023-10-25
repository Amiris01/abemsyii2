<?php

use app\models\Teacher;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$existingTeacherIDs = Teacher::find()->select(['userid'])->column();
$teacher = User::find()
    ->select(['username'])
    ->where(['role' => 'teacher'])
    ->andWhere(['not in', 'id', $existingTeacherIDs])
    ->indexBy('id')
    ->column();

/** @var yii\web\View $this */
/** @var app\models\Teacher $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="teacher-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php if ($model->isNewRecord) : ?>
    <?= $form->field($model, 'userid')->dropDownList($teacher, ['prompt' => 'Pilih Pengguna'])->label('ID Pengguna') ?>
    <?php endif; ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(
    [
        '10' => 'Aktif',
        '0' => 'Tidak Aktif',
    ],
    ['prompt' => 'Pilih Status']
) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile_pic', [
    'template' => "{label}\n<div class='file-input-container'>{input}</div>\n{hint}\n{error}"
])->fileInput(['style' => 'border: 1px solid black; padding: 10px;'])->label('Gambar Profil') ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Kembali', ['teacher/index'], ['class' => 'btn btn-secondary']) ?>
        <?= Html::resetButton('Kosongkan', ['class' => 'btn btn-danger']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
