<?php

namespace backend\modules\settings\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->layout='adminlayout';
        return $this->render('index');
    }
}
