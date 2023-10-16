<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?php if ($model->isNewRecord) : ?>
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    <?php else : ?>
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'readonly' => true]) ?>
    <?php endif; ?>

    <?= $form->field($model, 'status')->dropDownList(
    [
        '10' => 'Active',
        '0' => 'Inactive',
    ],
    ['prompt' => 'Select Status']
) ?>

    <?= $form->field($model, 'role')->dropDownList(
    [
        'admin' => 'Admin',
        'student' => 'Student',
        'teacher' => 'Teacher',
    ],
    ['prompt' => 'Select Role']
) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Back', ['user/index'], ['class' => 'btn btn-secondary']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
