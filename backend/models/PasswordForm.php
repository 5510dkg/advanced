<?php
    namespace backend\models;
   
    use Yii;
    use yii\base\Model;
//    use backend\modules\admin\models\Users;
    use common\models\User;
    class PasswordForm extends Model{
        public $oldpass;
        public $newpass;
        public $repeatnewpass;
       
        public function rules(){
            return [
                [['newpass','repeatnewpass'],'required'],
               
                ['repeatnewpass','compare','compareAttribute'=>'newpass'],
            ];
        }
       
        public function findPasswords($attribute, $params){
            $user = Users::find()->where([
                'username'=>Yii::$app->user->identity->username
            ])->one();
            $password = $user->password;
            if($password!=$this->oldpass)
                $this->addError($attribute,'Old password is incorrect');
        }
       
        public function attributeLabels(){
            return [
                'oldpass'=>'Old Password',
                'newpass'=>'New Password',
                'repeatnewpass'=>'Repeat New Password',
            ];
        }
    } 