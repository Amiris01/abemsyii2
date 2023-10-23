<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\StudentSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="student-search">
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

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'parent_name') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'parent_contact') ?>

    <div class="form-group text-center">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
