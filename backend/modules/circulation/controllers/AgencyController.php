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

    /**
     * Lists all Agency models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout='adminlayout';
        $searchModel = new AgencySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Agency model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Agency #".$id,
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
     * Creates a new Agency model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
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
     * Updates an existing Agency model.
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
                    'title'=> "Update Agency #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
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
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];
            }else{
                 return [
                    'title'=> "Update Agency #".$id,
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
     * Delete an existing Agency model.
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
     * Delete multiple existing Agency model.
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
                  $user = new Users;
                  $user_id=$rowData[0][0];
                  $user->name=$rowData[0][1];
                  $user->username=$rowData[0][2];
                  $user->auth_key=date("ymdhis");
                  $user->password_hash=$rowData[0][3];
                  $user->password_reset_token=date("ymdhis");
                  $user->email=$rowData[0][4];
                  $user->mobile=$rowData[0][5];
                  $user->extension_no=$rowData[0][6];
                  $user->department_id=$rowData[0][7];
                  $user->designation_id=$rowData[0][8];
                  $user->role_group_id=$rowData[0][9];
                  $user->created_at=date("Ymdhis");;

                  $user->status='1';

                  $user->save(false);

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




    // agency multiple upload section ends here

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
