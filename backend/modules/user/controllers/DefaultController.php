<?php

namespace backend\modules\user\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionDashboard() {
        return $this->render('dashboard');
    }
    public function actionBillingdashboard(){
        return $this->render('billingdashboard');
    }
}
