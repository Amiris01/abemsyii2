<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-search">
<div class="container">
        <div class="user-box" style=" max-width: 500px;
            margin: auto;
            padding: 10px;">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?= $form->field($model, 'role')->dropDownList([
    'admin' => 'Admin',
    'student' => 'Pelajar',
    'teacher' => 'Guru',
], ['prompt' => 'Select Role']) ?>


    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group text-center">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
