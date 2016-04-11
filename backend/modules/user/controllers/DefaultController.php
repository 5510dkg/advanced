<?php

namespace backend\modules\user\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\base\DynamicModel;
use yii\data\ActiveDataProvider;

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
    public function actionLebeldashboard(){
         $model = new DynamicModel([
                'railway', 'ordinary','registered', 'sort_by','state'
            ]);
            $model->addRule('railway', 'string',['max'=>32]);
            $model->addRule('ordinary', 'string',['max'=>32]);
            $model->addRule('registered', 'string',['max'=>32]);
            $model->addRule('sort_by', 'string',['max'=>32]);
            
             return $this->render('form', ['model'=>$model,
           
            ]);
        
    }
    
}
