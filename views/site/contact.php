<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Hubungi Kami';
?>
<div class="site-contact">

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        

        <div class="container">
        <div class="contact-box" style=" max-width: 500px;
            margin: auto;
            padding: 40px;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-top: 50px;">

                <?php $form = ActiveForm::begin([
                    'id' => 'contact-form',
                    'fieldConfig' => [
                        'template' => "{label}\n{input}\n{error}",
                        'inputOptions' => ['class' => 'form-control'],
                        'errorOptions' => ['class' => 'invalid-feedback'],
                    ],
                    ]); ?>
                    <h2 class="text-center">HUBUNGI KAMI</h2>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Nama') ?>

                    <?= $form->field($model, 'email')->label('Emel') ?>

                    <?= $form->field($model, 'subject')->label('Subjek') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6])->label('Kandungan') ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6" style="margin-left:30px; margin-top:10px;">{input}</div></div>',
                    ])->label('Kod Verifikasi') ?>

                    <div class="form-group">
                        <?= Html::submitButton('Hantar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
</div>
</div>