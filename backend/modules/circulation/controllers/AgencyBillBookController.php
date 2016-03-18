<?php
namespace backend\modules\circulation\controllers;

use Yii;
use backend\modules\circulation\models\AgencyBillBook;
use backend\modules\circulation\models\AgencyBillBookSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
   


/**
 * AgencyBillBookController implements the CRUD actions for AgencyBillBook model.
 */
class AgencyBillBookController extends Controller
{
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

    /**
     * Lists all AgencyBillBook models.
     * @return mixed
     */
    public function actionIndex()
    {    
       // $this->layout='adminlayout';
        $searchModel = new AgencyBillBookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    
    
    public function actionBill()
    {    $month=Yii::$app->request->get('month');
        $bill=new AgencyBillBook();
        $total=$bill->getBill($month);
        return $this->render('bill',[
            'rs'=>$total,
            'month'=>$month
        ]);
    }
    
    public function actionDetail() {
        $agency_id=Yii::$app->request->get('agency_id');
        $month=Yii::$app->request->get('month');
        return $this->render('detail');
        
        
    }
             
    

    /**
     * Displays a single AgencyBillBook model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "AgencyBillBook #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new AgencyBillBook model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new AgencyBillBook();  
        $newmodel= new \backend\modules\circulation\models\MagazineRecordBook();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return hii;
//                return [
//                    'title'=> "Create new AgencyBillBook",
//                    'content'=>$this->renderAjax('create', [
//                        'model' => $model,
//                    ]),
//                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
//                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
//        
//                ];         
            }else if($model->load($request->post())){
                return 'hiii';
//                return [
//                    'forceReload'=>'#crud-datatable-pjax',
//                    'title'=> "Create new AgencyBillBook",
//                    'content'=>'<span class="text-success">Create AgencyBillBook success</span>',
//                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
//                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
//          
//                ];         
            }else{  
             $dates=$model->getspecialeditiondates();
            
            if(!empty($dates)){
                //$allagencies=Yii::$app->mycomponent->calsunday();
                foreach($dates as $k=>$v){
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
                    $model->price_per_piece=$v['price'];
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
                                     
                   
                  //  $i++;
                  }
                
                }      
                //update
            }
            $dd=date('Y-m-d');
                  $month=date( "Ym", strtotime( "$dd" ) );
              //    echo $month;exit;
                  $mz= new \backend\modules\circulation\models\MagazineRecordBook();
                  $mz->updateAll(array( 'status' => 1 ), 'status = 0');
                  return $this->actionShow($month);
//               if($model->save(false)){
//                   return 'hii';
//               }
//               else{
//                   return 'no';
//              }
//                return [
//                    'title'=> "Create new AgencyBillBook",
//                    'content'=>$this->renderAjax('create', [
//                        'model' => $model,
//                    ]),
//                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
//                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
//        
//                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing AgencyBillBook model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionShow($month=NULL) {
        
      return $this->render('show',['month'=>$month]); 
        
    }
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update AgencyBillBook #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "AgencyBillBook #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update AgencyBillBook #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing AgencyBillBook model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing AgencyBillBook model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the AgencyBillBook model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AgencyBillBook the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AgencyBillBook::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
