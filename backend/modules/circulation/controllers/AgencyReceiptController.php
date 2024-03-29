<?php

namespace backend\modules\circulation\controllers;

use Yii;
use backend\modules\circulation\models\AgencyReceipt;
use backend\modules\circulation\models\AgencyReceiptSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\base\DynamicModel;
use backend\modules\circulation\models\Agency;
use yii\data\ActiveDataProvider;

/**
 * AgencyReceiptController implements the CRUD actions for AgencyReceipt model.
 */
class AgencyReceiptController extends Controller
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
     * Lists all AgencyReceipt models.
     * @return mixed
     */
    public function actionIndex()
    {    
        
      //  $this->layout='adminlayout';
        $searchModel = new AgencyReceiptSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionList() {
        //$this->layout='adminlayout';
        
        $searchModel = new \backend\modules\circulation\models\AgencySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        
    }


    /**
     * Displays a single AgencyReceipt model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "AgencyReceipt #".$id,
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
     * Creates a new AgencyReceipt model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      //  $this->layout='adminlayout';
        $request = Yii::$app->request;
        $model = new AgencyReceipt();  
        $id=$request->get('id');   
        $billing_id=$model->get_agency_billing_id($id);
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['success', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'id'=>$id,
                    'billing_id'=>$billing_id
                ]);
            }
        
       
    }
    
    public function actionSuccess(){
         return $this->render('success');
    }


    
    /**
     * Updates an existing AgencyReceipt model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
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
                    'title'=> "Update AgencyReceipt #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "AgencyReceipt #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update AgencyReceipt #".$id,
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
     * Delete an existing AgencyReceipt model.
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
     * Delete multiple existing AgencyReceipt model.
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
     * Finds the AgencyReceipt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AgencyReceipt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AgencyReceipt::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    public function actionSearchview(){
        $model = new DynamicModel([
                'name', 'billing_id', 'mail_pincode','state'
            ]);
            $model->addRule('name', 'string',['max'=>90]);
            $model->addRule('billing_id', 'string',['max'=>90]);
            $model->addRule('mail_pincode', 'string',['max'=>90]);
            $model->addRule('state', 'string',['max'=>90]);
       

            if($model->load(Yii::$app->request->post())){
                        // do somenthing with model
                            $params=Yii::$app->request->post();
                           // print_r($params);exit;
                            $query = Agency::find();
                            $dataProvider = new ActiveDataProvider([
                                'query' => $query,
                            ]);
                            $model->load($params);
                           
                                
                $query->andFilterWhere(['like', 'name', $model->name]);
                $query->andFilterWhere(['like', 'billing_id', $model->billing_id]);
                $query->andFilterWhere(['like', 'mail_pincode', $model->mail_pincode]);
                $query->andFilterWhere(['mail_state_id'=>$model->state]);
                
            return $this->render('viewagency',
                            [
                             'list'=>$dataProvider,
                             'model'=>$model,
                            'data'=>$this->actionAgencylist()
                            ]);
        }
        return $this->render('searchview', ['model'=>$model,
            'data'=>$this->actionAgencylist(),
            ]);
    }
    
    
    
    
    //search list for auto select dropdown
     public function actionAgencylist() {
    $query = new \yii\db\Query;
    
    $query->select('name')
        ->from('agency')->orderBy('name');
    $command = $query->createCommand();
    $data = $command->queryAll();
    $out = [];
    foreach ($data as $d) {
        $out[] = $d['name'];
    }
    return $out;
}
    
    
}
