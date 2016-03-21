<?php
namespace backend\modules\circulation\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\modules\circulation\models\AgencyBillBook;
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
        $model = new AgencyBillBook();  
        $request=Yii::$app->request;
       // echo $request['time'];
        $dates=$request->post('date1[]');
        $prices=$request->post('price[]');
        
        $alldate=Yii::$app->mycomponent->calsunday();
       // print_r($alldate);
        foreach ($alldate as $date){
            $agency=$model->get_all_agencies($v['date']);
                //echo count($agency);exit;
               // echo'<pre>';
               // print_r($agency);exit;
               // echo '</pre>';
            $i=1;
                foreach ($agency as $key=> $val) {
                   // echo $i;
                    $model->id=NULL;
                    $model->isNewRecord = TRUE; 
                    $model->agency_id=$val['agency_id'];
                    $model->issue_date=$v['date'];
                    $model->pjy=$val['panchjanya'];
                    $model->org=$val['organiser'];
                    $model->total_copies=$val['panchjanya']+$val['organiser'];
                    if(in_array($date, $date1)){
                        $key = array_search($date, $date1); 
                    $model->price_per_piece=$prices[$key];
                    }
                    else
                    {
                      $model->price_per_piece=$v['price']; 
                    }
                    $tot=$val['panchjanya']+$val['organiser'];
                    $price=($val['panchjanya']+$val['organiser'])*$v['price'];
                    $model->total_price=$price;
                    $dsc=$model->get_discount($tot);
                    $per=($price*$dsc)/100;
                    $model->discount=$dsc;
                    $discounted=$price-$per;
                    $model->discounted_amt=$per;
                    $model->final_total=$discounted;
                    $model->created_on=  date('Y-m-d H:i:s');
                    $model->save(false);
                    
                    $dd=$v['date'];
        }
        
    }
    }
    
}
