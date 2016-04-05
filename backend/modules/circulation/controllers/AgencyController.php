<?php

namespace backend\modules\circulation\controllers;

use Yii;
use backend\modules\circulation\models\Agency;
use backend\modules\circulation\models\AgencySearch;
use backend\modules\circulation\models\AgencyCopiesRecords;
use backend\modules\circulation\models\AgencyCreationUpdationRecords;
use backend\modules\circulation\models\AgencyCommission;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\base\DynamicModel;
use yii\data\ActiveDataProvider;

/**
 * AgencyController implements the CRUD actions for Agency model.
 */
class AgencyController extends Controller
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

    public function actionList(){
        return $this->render('list');
    }
    /**
     * Lists all Agency models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(isset($_GET[1]['q'])){
             $q=$_GET[1]['q']; 
        }
        else $q='no';
       // $this->layout='adminlayout';
         if(Yii::$app->user->can('view-agency')){
        $searchModel = new AgencySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'q'=>$q,
        ]);
         }
         else{
             throw new \yii\web\ForbiddenHttpException('You Dont Have Permission To '
                     . 'Access This Function');
         }
    }


    /**
     * Displays a single Agency model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(isset($_GET['q'])){
             $q=$_GET['q']; 
        }
        else $q='no';
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Agency #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id,'q'=>$q],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Agency model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
         if(isset($_GET[1]['q'])){
             $q=$_GET[1]['q']; 
        }
        else $q='no';
         if(Yii::$app->user->can('create-agency')){
        $request = Yii::$app->request;
        $model = new Agency();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Agency",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'q'=>$q,
                        'data'=>$this->actionReferencesList(),
                        'acc'=>$this->actionAccountList(),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])

                ];
            }else if($model->load($request->post()) && $model->save()){
                        $bookrecord=new AgencyCopiesRecords();
                        $bookrecord->agency_id=$model->id;
                        $bookrecord->date=date("Y-m-d");
                        $bookrecord->pachjanya=$model->panchjanya;
                        $bookrecord->organiser=$model->organiser;
                        $bookrecord->save();

                        $cr= new AgencyCreationUpdationRecords();
                        $cr->agency_id=$model->id;
                        $cr->date=date("Y-m-d");
                        $cr->time=date("H:i:s");
                        $cr->status='0';
                        $cr->save();

                        $com=new AgencyCommission();
                        $com->agency_id=$model->id;
                        $com->amount=$model->commission;
                        $com->date=date("Y-m-d");
                        $com->save();



                    return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new Agency",
                    'content'=>'<span class="text-success">Agency Created Successfully  </span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])

                ];
            }else{
                return [
                    'title'=> "Create new Agency",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'q'=>$q,
                        'data'=>$this->actionReferencesList(),
                        'acc'=>$this->actionAccountList(),
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
                    'q'=>$q,
                    'data'=>$this->actionReferencesList(),
                    'acc'=>$this->actionAccountList(),
                ]);
            }
        }
         }else{
             throw new \yii\web\ForbiddenHttpException('You do not have permission to access this function');
         }

    }

    /**
     * Updates an existing Agency model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(isset($_GET['q'])){
             $q=$_GET['q']; 
        }
        else $q='no';
        if(Yii::$app->user->can('update-agency')){
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Agency #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'q'=>$q,
                        'data'=>$this->actionReferencesList(),
                        'acc'=>$this->actionAccountList(),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];
            }else if($model->load($request->post()) && $model->save()){


                        $bookrecord=new AgencyCopiesRecords();
                        $bookrecord->agency_id=$model->id;
                        $bookrecord->date=date("Y-m-d");
                        $bookrecord->pachjanya=$model->panchjanya;
                        $bookrecord->organiser=$model->organiser;
                        $bookrecord->save();

                        $cr= new AgencyCreationUpdationRecords();
                        $cr->agency_id=$model->id;
                        $cr->date=date("Y-m-d");
                        $cr->time=date("H:i:s");
                        $cr->status='1';
                        $cr->save();

                        $com=new AgencyCommission();
                        $com->agency_id=$model->id;
                        $com->amount=$model->commission;
                        $com->date=date("Y-m-d");
                        $com->save();


                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Agency #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id,'q'=>$q],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];
            }else{
                 return [
                    'title'=> "Update Agency #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'q'=>$q,
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
                    'q'=>$q,
                ]);
            }
        }
         }else{
             throw new \yii\web\ForbiddenHttpException('You do not have permission to access this function');
         }
    }

    /**
     * Delete an existing Agency model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
         if(Yii::$app->user->can('delete-agency')){
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
         else{
             throw new \yii\web\ForbiddenHttpException('You do not have permission to access this function');
         }


    }

     /**
     * Delete multiple existing Agency model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {
         if(Yii::$app->user->can('delete-agency')){
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
         else{
             throw new \yii\web\ForbiddenHttpException('You do not have permission to access this function');
         }

    }

    // Agency multiple upload starts here


        /*
        importing multiple users from excel sheet;
        */

        public function actionUpload(){
          $this->layout="adminlayout";
        //  echo 'hii';
          return $this->render('upload');
        }
        public function actionUploadagency(){

          if(empty($_FILES['file'])){
            echo json_encode(['error'=>'Please Select File to upload']);
            return;
          }
          $files=$_FILES['file'];
          $success=null;
          $paths=[];
          $filenames=$files['name'];
          $folder='agency';
          if(!file_exists('uploads'.DIRECTORY_SEPARATOR.$folder)){
            mkdir('uploads'.DIRECTORY_SEPARATOR.$folder,0777,true);
          }

          for($i=0;$i<count($filenames);$i++){
            $name=basename($filenames[$i]);
            $info = pathinfo($filenames[$i]);
            $ext = $info['extension']; // get the extension of the file
            $newname = date("Ymdhis").'.'.$ext;

            //$ext=explode(','.basename($filenames[$i]));
            $target="uploads".DIRECTORY_SEPARATOR.$folder.DIRECTORY_SEPARATOR.$newname;
            if(move_uploaded_file($files['tmp_name'][$i],$target)){
            //  $inputFile=basename( $files[$i]["name"]);
              $success=true;
              $paths[]=$target;
              //File reading starts here

            //  $inputFile="uploads/users/user.xlsx";
              $inputFile="$target";
                try {
                      $inputFileType=\PHPExcel_IOFactory::identify($inputFile);
                      $objReader=\PHPExcel_IOFactory::createReader($inputFileType);
                      $objPHPExcel=$objReader->load($inputFile);
                } catch (Exception $e) {
                      die("Please Upload Proper file format");
                }
                $sheet=$objPHPExcel->getSheet(0);
                $highestRow=$sheet->getHighestRow();
                $highestColoumn=$sheet->getHighestColumn();
                for ($row=1;$row<=$highestRow;$row++){
                  $rowData=$sheet->rangeToArray('A'.$row.':'.$highestColoumn.$row,NULL,TRUE,FALSE);
                  if($row==1){
                    continue;
                  }
                  $agency=new Agency();
                  $agency->id                 =$rowData[0][0];
                  $agency->name               =$rowData[0][1];
                  $agency->route_id           =$rowData[0][2];
                  $agency->vehicle_id         =$rowData[0][3];
                  $agency->reference          =$rowData[0][4];
                  $agency->email              =$rowData[0][5];
                  $agency->landline_no        =$rowData[0][6];
                  $agency->mobile_no          =$rowData[0][7];
                  $agency->status             =$rowData[0][8];
                  $agency->security_amt       =$rowData[0][9];
                  $agency->address_status     =$rowData[0][10];
                  $agency->mail_house_no      =$rowData[0][11];
                  $agency->mail_street_address=$rowData[0][12];
                  $agency->mail_p_office      =$rowData[0][13];
                  $agency->mail_country_id    =$rowData[0][14];
                  $agency->mail_state_id      =$rowData[0][15];
                  $agency->mail_district_id   =$rowData[0][16];
                  $agency->mail_pincode       =$rowData[0][17];
                  $agency->panchjanya         =$rowData[0][18];
                  $agency->organiser          =$rowData[0][19];
                  $agency->add_house_no       =$rowData[0][20];
                  $agency->add_street_address =$rowData[0][21];
                  $agency->add_p_office       =$rowData[0][22];
                  $agency->add_country_id     =$rowData[0][23];
                  $agency->add_state_id       =$rowData[0][24];
                  $agency->add_district_id    =$rowData[0][25];
                  $agency->add_pincode        =$rowData[0][26];
                  $agency->commission         =$rowData[0][27];
                  $agency->issue_start_date   =$rowData[0][28];
                  $agency->comment            =$rowData[0][29];
                  $agency->agency_type        =$rowData[0][30];
                  $agency->train_no           =$rowData[0][31];
                  $agency->source             =$rowData[0][32];
                  $agency->train_name         =$rowData[0][33];
                  $agency->save();

    //              print_r($user->getErrors());
                }

              //file reading ends here
            }else{
              $success=false;
              break;
            }
          }
          if($success==true){
            $output=['error'=>'File uploaded'];
          }
          elseif ($success==false) {
            $output=['error'=>'Error while uploading images'];
            foreach($paths as $file){
                unlink($file);
            }
          }else{
            $output=['error'=>'No files Procressed'];
          }
          echo json_encode($output);


    }

    public function actionDownload() {
     $path = 'download/format';

     $file = $path . '/useruploadformat.xlsx';

     if (file_exists($file)) {

     Yii::$app->response->sendFile($file);

    }
    }

  /*
  *
  */




    // agency multiple upload section ends here
    /*
     * agency search form for update address
     */    
    public function actionSearchaddress(){
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
                
            return $this->render('updateaddress',
                            [
                             'list'=>$dataProvider,
                             'model'=>$model,
                            'data'=>$this->actionAgencylist()
                            ]);
        }
        return $this->render('searchaddress', ['model'=>$model,
            'data'=>$this->actionAgencylist(),
            ]);
    }
    
    /*
     * Search list for update address
     */
    public function actionSearchcopies(){
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
                
            return $this->render('updatecopies',
                            [
                             'list'=>$dataProvider,
                             'model'=>$model,
                            'data'=>$this->actionAgencylist()
                            ]);
        }
        return $this->render('searchcopies', ['model'=>$model,
            'data'=>$this->actionAgencylist(),
            ]);
    }
    /*
     * Search list for update address
     */
    public function actionSearchdeactivate(){
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
                
            return $this->render('updatedeactivate',
                            [
                             'list'=>$dataProvider,
                             'model'=>$model,
                            'data'=>$this->actionAgencylist()
                            ]);
        }
        return $this->render('searchdeactivate', ['model'=>$model,
            'data'=>$this->actionAgencylist(),
            ]);
    }
    /*
     * Search list for update address
     */
    public function actionSearchdelivery(){
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
                
            return $this->render('updatedelivery',
                            [
                             'list'=>$dataProvider,
                             'model'=>$model,
                            'data'=>$this->actionAgencylist()
                            ]);
        }
        return $this->render('searchdelivery', ['model'=>$model,
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
    
    
    /** 
 * Your controller action to fetch the list
 */
public function actionReferenceList($q = null) {
    $query = new Query;
    
    $query->select('reference')
        ->from('agency')
        ->where('reference LIKE "%' . $q .'%"')
        ->orderBy('reference');
    $command = $query->createCommand();
    $data = $command->queryAll();
    $out = [];
    foreach ($data as $d) {
        $out[] = ['value' => $d['reference']];
    }
    echo Json::encode($out);
    
}
public function actionReferencesList() {
    $query = new \yii\db\Query;
    
    $query->select('reference')
        ->from('agency')->orderBy('reference');
    $command = $query->createCommand();
    $data = $command->queryAll();
    $out = [];
    foreach ($data as $d) {
        $out[] = $d['reference'];
    }
    return $out;
}
public function actionAccountList() {
    $query = new \yii\db\Query;
    
    $query->select('account_id')
        ->from('agency')->orderBy('account_id');
    $command = $query->createCommand();
    $data = $command->queryAll();
    $out = [];
    foreach ($data as $d) {
        $out[] = $d['account_id'];
    }
    return $out;
}
    /**
     * Finds the Agency model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Agency the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Agency::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
