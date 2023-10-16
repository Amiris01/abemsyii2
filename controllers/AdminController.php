<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ForbiddenHttpException;


class AdminController extends Controller{

  public function actionDashboard()
{
    return $this->render('dashboard');
}

}

?>

