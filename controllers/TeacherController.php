<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;


class TeacherController extends Controller{
  public function actionDashboard()
{
    return $this->render('dashboard');
}

}

?>