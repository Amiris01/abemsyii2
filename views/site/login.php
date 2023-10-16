<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Log Masuk';
?>
<div class="site-login">


    <div class="container">
        <div class="login-box" style=" max-width: 500px;
            margin: auto;
            padding: 40px;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-top: 50px;">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'inputOptions' => ['class' => 'form-control'],
                    'errorOptions' => ['class' => 'invalid-feedback'],
                ],
            ]); ?>
            <h2 class="text-center">LOG MASUK</h2>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Nama Pengguna') ?>

            <?= $form->field($model, 'password')->passwordInput()->label('Kata Laluan') ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'label' => "Ingat Saya",
            ]) ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Log Masuk', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
