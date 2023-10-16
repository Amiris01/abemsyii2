<?php

/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\User;
use app\models\Student;
$this->title = 'Admin Dashboard';
$this->registerCssFile('@web/css/bootstrap.css');
$userroute = Url::to(['/user']);
$studentroute = Url::to(['/student']);
$userCount = User::find()->count();
$studentCount = Student::find()->count();
?>

<div class="container-fluid" style="margin-top: 10px; padding-bottom:50px;">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="height: 400px; margin-top:50px; background-color: silver;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">DASHBOARD</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $userroute ?>" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">URUS PENGGUNA</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">URUS SUBJEK</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">URUS GURU</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $studentroute ?>" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">URUS PELAJAR</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">URUS BAHAN PEMBELAJARAN</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">LIHAT REKOD</span>
                        </a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
        <div class="row">

    <div class="col py-3" style="margin-top:35px;">
        <div class="card text-center" style="width: 18rem; background-color: silver;">
            <?= Html::img('@web/images/user.png', ['alt' => 'Banner 1', 'class' => 'card-img-top mx-auto', 'style' => 'width: 100px; height: 100px; margin-top:20px;']) ?>
            <div class="card-body">
                <h5 class="card-title">User Count</h5>
                <p class="card-text"><?= $userCount ?></p>
            </div>
        </div>
    </div>

    <div class="col py-3" style="margin-top:35px;">
        <div class="card text-center" style="width: 18rem; background-color: lightblue;">
            <?= Html::img('@web/images/student.png', ['alt' => 'Image 2', 'class' => 'card-img-top mx-auto', 'style' => 'width: 100px; height: 100px; margin-top:20px;']) ?>
            <div class="card-body">
                <h5 class="card-title">Student Count</h5>
                <p class="card-text"><?= $studentCount ?></p>
            </div>
        </div>
    </div>

    <div class="col py-3" style="margin-top:35px;">
        <div class="card text-center" style="width: 18rem; background-color: lightgreen;">
            <?= Html::img('@web/images/teacher.png', ['alt' => 'Image 3', 'class' => 'card-img-top mx-auto', 'style' => 'width: 100px; height: 100px; margin-top:20px;']) ?>
            <div class="card-body">
                <h5 class="card-title">Teacher Count</h5>
                <p class="card-text">Will be hired soon.</p>
            </div>
        </div>
    </div>
</div>


    </div>
</div>

