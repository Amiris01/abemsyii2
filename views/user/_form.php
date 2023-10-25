<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'disabled' => !$model->isNewRecord])->label('Nama Pengguna') ?>

    <?php if ($model->isNewRecord) : ?>
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true])->label('Kata Laluan') ?>
    <?php endif; ?>

    <?= $form->field($model, 'status')->dropDownList(
    [
        '10' => 'Aktif',
        '0' => 'Tidak Aktif',
    ],
    ['prompt' => 'Pilih Status']
) ?>

    <?php if ($model->isNewRecord) : ?>
    <?= $form->field($model, 'role')->dropDownList(
    [
        'admin' => 'Admin',
        'student' => 'Pelajar',
        'teacher' => 'Guru',
    ],
    [
        'prompt' => 'Pilih Peranan',
    ]
)->label('Peranan') ?>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Kembali', ['user/index'], ['class' => 'btn btn-secondary']) ?>
        <?= Html::resetButton('Kosongkan', ['class' => 'btn btn-danger']); ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
