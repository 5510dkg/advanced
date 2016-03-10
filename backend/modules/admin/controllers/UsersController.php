<?php

namespace backend\modules\admin\controllers;

use Yii;
use backend\modules\admin\models\Users;
use backend\modules\admin\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
//use phpoffice\phpexcel;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {

      //  $this->layout = "adminlayout";
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /*
    importing multiple users from excel sheet;
    */

    public function actionUpload(){
     // $this->layout="adminlayout";
    //  echo 'hii';
      return $this->render('upload');
    }
    public function actionUploadusers(){

      if(empty($_FILES['file'])){
        echo json_encode(['error'=>'Please Select File to upload']);
        return;
      }
      $files=$_FILES['file'];
      $success=null;
      $paths=[];
      $filenames=$files['name'];
      $folder='users';
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


      //
      // $inputFile="uploads/users/user.xlsx";
      //
      //   try {
      //         $inputFileType=\PHPExcel_IOFactory::identify($inputFile);
      //         $objReader=\PHPExcel_IOFactory::createReader($inputFileType);
      //         $objPHPExcel=$objReader->load($inputFile);
      //   } catch (Exception $e) {
      //         die("Error hai baccha");
      //   }
      //   $sheet=$objPHPExcel->getSheet(0);
      //   $highestRow=$sheet->getHighestRow();
      //   $highestColoumn=$sheet->getHighestColumn();
      //   for ($row=1;$row<=$highestRow;$row++){
      //     $rowData=$sheet->rangeToArray('A'.$row.':'.$highestColoumn.$row,NULL,TRUE,FALSE);
      //     if($row==1){
      //       continue;
      //     }
      //     $user = new Users;
      //     $user_id=$rowData[0][0];
      //     $user->name=$rowData[0][1];
      //     $user->username=$rowData[0][2];
      //     $user->auth_key=$rowData[0][3];
      //     $user->password_hash=$rowData[0][4];
      //     $user->password_reset_token=$rowData[0][5];
      //     $user->email=$rowData[0][6];
      //     $user->mobile=$rowData[0][7];
      //     $user->extension_no=$rowData[0][8];
      //     $user->department_id=$rowData[0][9];
      //     $user->designation_id=$rowData[0][10];
      //     $user->role_group_id=$rowData[0][11];
      //     $user->created_at=$rowData[0][12];
      //     $user->deleted_at=$rowData[0][13];
      //     $user->status=$rowData[0][14];
      //     $user->updated_at=$rowData[0][15];
      //     $user->save(false);
      //     print_r($user->getErrors());
      //   }
      //   die("okay");

}

public function actionDownload() {
 $path = 'download/format';

 $file = $path . '/useruploadformat.xlsx';

 if (file_exists($file)) {

 Yii::$app->response->sendFile($file);

}
}

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Users #".$id,
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
     * Creates a new Users model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('create-user')){
            $request = Yii::$app->request;
        $model = new Users();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Users",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])

                ];
            }else if($model->load($request->post())){
                        $model->created_at=date("Y-m-d H:i:s");
                        $model->save();
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new Users",
                    'content'=>'<span class="text-success">Create Users success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])

                ];
            }else{
                return [
                    'title'=> "Create new Users",
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
            if ($model->load($request->post())) {
              //  $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($request->post('password_hash'));
                 //   $model->auth_key = Yii::$app->getSecurity()->generateRandomString($request->post('auth_key'));
                $model->created_at=date('Y-m-d H:i:s');

                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        }
        else{
            throw  new \yii\web\ForbiddenHttpException;
        }

    }

    /**
     * Updates an existing Users model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
         if(Yii::$app->user->can('update-user')){
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Users #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];
            }else if($model->load($request->post())){

                  // $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($request->post('password_hash'));

                //   $model->auth_key = Yii::$app->getSecurity()->generateRandomString($request->post('auth_key'));

                    $model->updated_at=date("Y-m-d H:i:s");
                    $model->save();
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Users #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];
            }else{
                 return [
                    'title'=> "Update Users #".$id,
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
         else{
             throw new \yii\web\ForbiddenHttpException;
         }
    }

    /**
     * Delete an existing Users model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
         if(Yii::$app->user->can('delete-user')){
        $request = Yii::$app->request;
       $this->findModel($id)->delete();

        if($request->isAjax){
           // $this->findModel($id)->delete();
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
             throw new \yii\web\ForbiddenHttpException;
         }


    }

     /**
     * Delete multiple existing Users model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {
         if(Yii::$app->user->can('delete-user')){
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
             throw new \yii\web\ForbiddenHttpException;
         }

    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
