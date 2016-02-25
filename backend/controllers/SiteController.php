<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

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
                        'actions' => ['logout', 'index'],
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
}
