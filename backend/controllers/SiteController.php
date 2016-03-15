<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use backend\models\PasswordForm;
use common\models\User;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','changepassword'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
      //return   $this->render('admin/index');
          if(Yii::$app->user->identity->role_group_id =='1'){
                $this-> redirect(array('/admin/default/index'));
            }
            if(Yii::$app->user->identity->role_group_id =='2'){
                $this-> redirect(array('/user/default/index'));
            }
            if(Yii::$app->user->identity->role_group_id =='3'){
                $this-> redirect(array('/approver/default/index'));
            }
            if(Yii::$app->user->identity->role_group_id =='4'){
                $this-> redirect(array('/manager/default/index'));
            }
       
       // return $this->render('index');
    }

    public function actionLogin()
    {
        $this->layout='loginlayout';
        if (!\Yii::$app->user->isGuest) {
              $this-> redirect(array('/admin/default/index'));
           // return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
            if(Yii::$app->user->identity->role_group_id =='1'){
                $this-> redirect(array('/admin/default/index'));
            }
            if(Yii::$app->user->identity->role_group_id =='2'){
                $this-> redirect(array('/user/default/index'));
            }
            if(Yii::$app->user->identity->role_group_id =='3'){
                $this-> redirect(array('/approver/default/index'));
            }
            if(Yii::$app->user->identity->role_group_id =='4'){
                $this-> redirect(array('/manager/default/index'));
            }
           
           // return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function actionChangepassword(){
        $model = new PasswordForm;
        $modeluser = User::find()->where([
            'username'=>Yii::$app->user->identity->username
        ])->one();
     
        if($model->load(Yii::$app->request->post())){
            if($model->validate()){
                try{
                    $modeluser->password = $_POST['PasswordForm']['newpass'];
                    if($modeluser->save()){
                        Yii::$app->getSession()->setFlash(
                            'success','Password changed'
                        );
                        return $this->redirect(['index']);
                    }else{
                        Yii::$app->getSession()->setFlash(
                            'error','Password not changed'
                        );
                        return $this->redirect(['index']);
                    }
                }catch(Exception $e){
                    Yii::$app->getSession()->setFlash(
                        'error',"{$e->getMessage()}"
                    );
                    return $this->render('changepassword',[
                        'model'=>$model
                    ]);
                }
            }else{
                return $this->render('changepassword',[
                    'model'=>$model
                ]);
            }
        }else{
            return $this->render('changepassword',[
                'model'=>$model
            ]);
        }
    }
}
