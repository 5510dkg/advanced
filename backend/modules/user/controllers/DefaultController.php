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
use kartik\mpdf\Pdf;

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
                'railway','date' ,'ordinary','registered', 'state','district','copy','po','train',
                 'state1','district1','copy1','po1','state2','district2','copy2','po2'
            ]);
            $model->addRule('railway', 'string',['max'=>32]);
            $model->addRule('date', 'string',['max'=>32]);
            $model->addRule('date', 'required');
            $model->addRule('ordinary', 'string',['max'=>32]);
            $model->addRule('registered', 'string',['max'=>32]);
            $model->addRule('state','string',['max'=>32]);
            $model->addRule('district','string',['max'=>32]);
            $model->addRule('po','string',['max'=>32]);
            $model->addRule('copy','string',['max'=>32]);
            $model->addRule('state1','string',['max'=>32]);
            $model->addRule('district1','string',['max'=>32]);
            $model->addRule('po1','string',['max'=>32]);
            $model->addRule('copy1','string',['max'=>32]);
            $model->addRule('state2','string',['max'=>32]);
            $model->addRule('district2','string',['max'=>32]);
            $model->addRule('po2','string',['max'=>32]);
            $model->addRule('copy2','string',['max'=>32]);
            $model->addRule('train','string',['max'=>32]);
            if($model->load(Yii::$app->request->post())){
                        // do somenthing with model
                            $params=Yii::$app->request->post();
                           // print_r($params);exit;
                            $ordp='null';
                            $regdp='null';
                            $railp='null';
                            $model->load($params);
                            if($model->railway==1){
                                
                              $train=$model->train;
                              $po=$model->po;
                              $copy=$model->copy;
                              $state=$model->state;
                              $disctrict=$model->district;
                              $arr=array();
                              //print_r($model);exit;
                              if($model->state==1){
                                  $arr['state']='state_id ASC';
                              }
                              if($model->district==1){
                                  $arr['district']='district_id ASC';
                              }
                              if($model->po){
                                  $arr['post_office']='post_office ASC';
                              }
                              if($model->train){
                                  $arr['train_name']='train_name ASC';
                              }
                              $rail= new RailwayPostData();
                              $rail->date=$model->date;
                              $rail->time=date('H:i:s');
                              $rail->generated_date=date('Y-m-d');
                              
                              
                              if($rail->save()){
                                  
                                  $dt=$model->date;
                                  if (!file_exists('railway_post/'.$dt)) {
                                      mkdir('railway_post/'.$dt, 0777, true);
                                    }
                                   $railp='railway_post/'.$dt.'/'.$model->date.'.pdf';
                                  $id=$rail->id;
                                  
                                    $pdf = new Pdf([
                                    'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                                    'orientation'=>'L',
                                    'destination' => Pdf::DEST_FILE,
                                    'filename' => 'railway_post/'.$dt.'/'.$model->date.'.pdf',
                                                
                                    'content' =>$this->renderPartial('print',['id'=>$id,'array'=>$arr
                                        ]),
                                    'options' => [
                                        'title' => 'Labels',
                                        'subject' => 'Generating Labels'
                                    ],
                                    // 'methods' => [
                                    //     'SetHeader' => ['Generated By: Ritesh Singh PDF Component||Generated On: ' . date("r")],
                                    //     'SetFooter' => ['|Page {PAGENO}|'],
                                    // ]
                    ]);
                                   $pdf->render();
                                   
                              }
                            }
                            if($model->ordinary==1){
                          //      echo 'hiiiiiiiii';exit;
                                 $ord=$model->ord_sort_by;  
                              $rail= new OrdinaryPostData();
                              $rail->date=$model->date;
                              $rail->time=date('H:i:s');
                              $rail->generated_date=date('Y-m-d');
                              
                              if($rail->save()){
                                  $dt=$model->date;
                                  if (!file_exists('ordinary_post/'.$dt)) {
                                      mkdir('ordinary_post/'.$dt, 0777, true);
                                    }
                                    $ordp='ordinary_post/'.$dt.'/'.$model->date.'.pdf';
                                  $id=$rail->id;
                                    $pdf = new Pdf([
                                    'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                                    'orientation'=>'L',
                                    'destination' => Pdf::DEST_FILE,
                                    'filename' => 'ordinary_post/'.$dt.'/'.$model->date.'.pdf',

                                    'content' =>$this->renderPartial('printordinary',['id'=>$id,'ord'=>$ord]),
                                    'options' => [
                                        'title' => 'Labels',
                                        'subject' => 'Generating Labels'
                                    ],
                                    // 'methods' => [
                                    //     'SetHeader' => ['Generated By: Ritesh Singh PDF Component||Generated On: ' . date("r")],
                                    //     'SetFooter' => ['|Page {PAGENO}|'],
                                    // ]
                    ]);
                                    $pdf->render();
                              }
                                
                            }
                            if($model->registered==1){
                              $ord=$model->ord_sort_by;  
                              $rail= new RegisteredPostData();
                              $rail->date=$model->date;
                              $rail->time=date('H:i:s');
                              $rail->generated_date=date('Y-m-d');
                              
                              if($rail->save()){
                                  $dt=$model->date;
                                  if (!file_exists('registered_post/'.$dt)) {
                                      mkdir('registered_post/'.$dt, 0777, true);
                                    }
                                    $regdp='registered_post/'.$dt.'/'.$model->date.'.pdf';
                                  $id=$rail->id;
                                    $pdf = new Pdf([
                                    'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                                    'orientation'=>'L',
                                    'destination' => Pdf::DEST_FILE,
                                        
                                    'filename' => 'registered_post/'.$dt.'/'.$model->date.'.pdf',

                                    'content' =>$this->renderPartial('regdprint',['id'=>$id,'ord'=>$ord]),
                                    'options' => [
                                        'title' => 'Labels',
                                        'subject' => 'Generating Labels'
                                    ],
                                    // 'methods' => [
                                    //     'SetHeader' => ['Generated By: Ritesh Singh PDF Component||Generated On: ' . date("r")],
                                    //     'SetFooter' => ['|Page {PAGENO}|'],
                                    // ]
                    ]);
                                    
                                    $pdf->render();
                              }
                            }
                            
                        return    $this->render('links',[
                                'ordp'=>$ordp,
                                'regdp'=>$regdp,
                                'railp'=>$railp
                            ]);
                            

        }
             return $this->render('form', ['model'=>$model,
           
            ]);
        
    }
    
}
