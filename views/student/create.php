<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Student $model */

$this->title = 'Tambah Pelajar';
?>
<div class="student-create" style="margin-top: 30px;">

<div class="container">
        <div class="user-box" style=" max-width: 500px;
            margin: auto;
            padding: 40px;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-top: 50px;">

    <h1 style="text-align:center;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
