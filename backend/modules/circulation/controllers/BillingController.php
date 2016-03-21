<?php
namespace backend\modules\circulation\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

Class BillingController extends Controller{
     /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }
    
    public function actionIndex(){
        return $this->render('welcome');
    }
    
    public function actionCreate(){
        $request=Yii::$app->request->post();
        print_r($request);exit;
        
    }
    
}
