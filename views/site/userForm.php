<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\UserForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;  

$this->title = 'Pendaftaran';
?>

<div style="margin-top: 30px;">
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model,'name'); ?>
<?= $form->field($model,'email'); ?>
<?= Html::submitButton('Submit',['class'=>'btn btn-success']); ?>
</div>

<?php ActiveForm::end()?>


