<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use app\models\Student;

$existingStudentIDs = Student::find()->select(['userid'])->column();
$student = User::find()
    ->select(['username'])
    ->where(['role' => 'student'])
    ->andWhere(['not in', 'id', $existingStudentIDs])
    ->indexBy('id')
    ->column();

/** @var yii\web\View $this */
/** @var app\models\Student $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <?php if ($model->isNewRecord) : ?>
    <?= $form->field($model, 'userid')->dropDownList($student, ['prompt' => 'Pilih Pengguna'])->label('ID Pengguna') ?>
    <?php endif; ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Nama')?>

    <?= $form->field($model, 'age')->textInput()->label('Umur') ?>

    <?= $form->field($model, 'status')->dropDownList(
    [
        '10' => 'Aktif',
        '0' => 'Tidak Aktif',
    ],
    ['prompt' => 'Pilih Status']
) ?>

<?= $form->field($model, 'profile_pic', [
    'template' => "{label}\n<div class='file-input-container'>{input}</div>\n{hint}\n{error}"
])->fileInput(['style' => 'border: 1px solid black; padding: 10px;'])->label('Gambar Profil') ?>


    <?= $form->field($model, 'parent_name')->textInput(['maxlength' => true])->label('Nama Penjaga') ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true])->label('Alamat') ?>

    <?= $form->field($model, 'parent_contact')->textInput(['maxlength' => true])->label('No. Tel. Penjaga') ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Kembali', ['student/index'], ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
