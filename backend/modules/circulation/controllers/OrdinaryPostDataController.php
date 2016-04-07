<?php

namespace backend\modules\circulation\controllers;

use Yii;
use backend\modules\circulation\models\OrdinaryPostData;
use backend\modules\circulation\models\OrdinaryPostDataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\base\DynamicModel;
use backend\modules\circulation\models\Agency;
use yii\data\ActiveDataProvider;
use kartik\mpdf\Pdf;

/**
 * OrdinaryPostDataController implements the CRUD actions for OrdinaryPostData model.
 */
class OrdinaryPostDataController extends Controller
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
     * Lists all OrdinaryPostData models.
     * @return mixed
     */
    public function actionIndex()
    {    
       // $this->layout='adminlayout';
        $searchModel = new OrdinaryPostDataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single OrdinaryPostData model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "OrdinaryPostData #".$id,
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
     * Creates a new OrdinaryPostData model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new OrdinaryPostData();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new OrdinaryPostData",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new OrdinaryPostData",
                    'content'=>'<span class="text-success">Create OrdinaryPostData success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new OrdinaryPostData",
                    'content'=>$this->renderAjax('create', [
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
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing OrdinaryPostData model.
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
                    'title'=> "Update OrdinaryPostData #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "OrdinaryPostData #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update OrdinaryPostData #".$id,
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
     * Delete an existing OrdinaryPostData model.
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
     * Delete multiple existing OrdinaryPostData model.
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
     * Finds the OrdinaryPostData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OrdinaryPostData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrdinaryPostData::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
        public function actionSearchform()
{
        $this->layout='adminlayout';
    $model = new \backend\modules\circulation\models\Agency();
    

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
            // form inputs are valid, do something here
            return;
        }
    }

    return $this->render('searchform', [
        'model' => $model,
    ]);
}
public function actionSearchview(){
        $model = new DynamicModel([
                'name', 'account_id', 'mail_pincode','state'
            ]);
            $model->addRule('name', 'string',['max'=>32]);
            $model->addRule('account_id', 'string',['max'=>32]);
            $model->addRule('mail_pincode', 'string',['max'=>32]);
            $model->addRule('state', 'string',['max'=>32]);
       

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
                $query->andFilterWhere(['like', 'account_id', $model->account_id]);
                $query->andFilterWhere(['like', 'mail_pincode', $model->mail_pincode]);
                $query->andFilterWhere(['mail_state_id'=>$model->state]);
                 $query->where(['route_id'=>'1']);
                
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

public function actionSingle($id) {
    $model = new DynamicModel([
                'date','id'
            ]);
            $model->addRule('date', 'required');
            $model->addRule('date', 'string',['max'=>32]);
            $model->addRule('id', 'string',['max'=>32]);
       

            if($model->load(Yii::$app->request->post())){
                        // do somenthing with model
                            $params=Yii::$app->request->post();
                            
                            $model->load($params);
                           $customer = \backend\modules\circulation\models\RailwayPostedData::findOne(['agency_id'=>$model->id,'date'=>$model->date]);
                           $data= new OrdinaryPostData();
                           $copy=$data->singleagencylist($model->id);
                           $pjy= $copy[0]['panchjanya'];
                           $org=$copy[0]['organiser'];
                           $customer->pjy = $pjy;
                           $customer->org = $org;
                           $customer->update();
                
            return $this->redirect(['print',
                            
                                'id'=>$customer->id,
                               
                            ]);
        }
        return $this->render('single', ['model'=>$model,
            'id'=>$id,
            ]);
    
    
}
public function actionPrint($id){
		//$this->layout='adminlayout';
		$request=Yii::$app->request;
		 if($request->isAjax){


		 }else{
		    $pdf = new Pdf([
        'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
        'orientation'=>'L',
        'destination' => Pdf::DEST_DOWNLOAD,
        'filename' => 'SingleOrdinaryPost"'.date('d-m-y').'".pdf',

        'content' =>$this->renderPartial('print'),
        'options' => [
            'title' => 'Labels',
            'subject' => 'Generating Label'
        ],
        // 'methods' => [
        //     'SetHeader' => ['Generated By: Ritesh Singh PDF Component||Generated On: ' . date("r")],
        //     'SetFooter' => ['|Page {PAGENO}|'],
        // ]
    ]);
	}
    return $pdf->render();

	}

}
