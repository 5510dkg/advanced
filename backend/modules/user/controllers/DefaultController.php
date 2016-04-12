<?php

namespace backend\modules\user\controllers;

use yii\web\Controller;
use backend\modules\circulation\models\RailwayPostData;
use backend\modules\circulation\models\RegisteredPostData;
use backend\modules\circulation\models\OrdinaryPostData;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\base\DynamicModel;
use yii\data\ActiveDataProvider;
use Yii;

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
                'railway', 'ordinary','registered', 'rail_sort_by','ord_sort_by','regd_sort_by'
            ]);
            $model->addRule('railway', 'string',['max'=>32]);
            $model->addRule('ordinary', 'string',['max'=>32]);
            $model->addRule('registered', 'string',['max'=>32]);
            $model->addRule('rail_sort_by', 'string',['max'=>32]);
            $model->addRule('ord_sort_by', 'string',['max'=>32]);
            $model->addRule('regd_sort_by', 'string',['max'=>32]);
            if($model->load(Yii::$app->request->post())){
                        // do somenthing with model
                            $params=Yii::$app->request->post();
                           // print_r($params);exit;
                            
                            $model->load($params);
                            if($model->railway==1){
                              $rail= new RailwayPostData();
                              $rail->date=$model->date;
                              $rail->time=date('H:i:s');
                              $rail->generated_date=date('Y-m-d');
                              $rail->save();
                                
                            }
                            if($model->ordinary==1){
                                
                            }
                            if($model->registered==1){
                                
                            }
                            
//                            echo '<pre>';
//                            print_r($model);
//                            echo '</pre>';
//                            exit;
                
        }
             return $this->render('form', ['model'=>$model,
           
            ]);
        
    }
    
}
