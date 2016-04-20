<?php

namespace backend\modules\circulation\models;
use backend\modules\circulation\models\Agency;
use backend\modules\settings\models\Country;
use backend\modules\settings\models\State;
use backend\modules\settings\models\District;

use Yii;

/**
 * This is the model class for table "registered_posted_data".
 *
 * @property integer $id
 * @property integer $agency_id
 * @property integer $tempelate_id
 * @property string $wt
 * @property string $postage
 * @property string $address_bar
 * @property string $sn
 * @property integer $pjy
 * @property integer $org
 * @property string $date
 * @property string $post_id
 *  @property string $state
 * @property string $district
 * @property string $postoffice
 * @property string $state_id
 * @property string $district_id
 * @property string $post_office
 */
class RegisteredPostedData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'registered_posted_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agency_id','license','tempelate_id','bundle_size', 'wt', 'postage', 'address_bar', 'sn', 'pjy', 'org', 'date'], 'required'],
            [['agency_id','bundle_size','tempelate_id', 'pjy', 'org'], 'integer'],
            [['address_bar','license','post_id'], 'string'],
            [['date'], 'safe'],
            [['wt', 'postage', 'sn'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'agency_id' => 'Agency ID',
            'tempelate_id' => 'Tempelate ID',
            'wt' => 'Wt',
            'postage' => 'Postage',
            'address_bar' => 'Address Bar',
            'sn' => 'Sn',
            'pjy' => 'Pjy',
            'org' => 'Org',
            'date' => 'Date',
            'post_id'=>'POST ID',
            'license'=>'license',
            'bundle_size'=>'bundle_size',
            'state'=>'State',
            'district'=>'District',
            'postoffice'=>'Post Office',
            'state_id'=>'State',
            'district_id'=>'District',
            'post_office'=>'Post Office',
        ];
    }

    /**
     * Finds the RegisteredPostData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RegisteredPostData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = $this->find->where(['post_id'=>$id])->all()) !== null) {
           // return $model;
             throw new NotFoundHttpException('The requested page does not exist.');
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function Agencyname($id){
            $query = (new \yii\db\Query())->select(['*'])->from('agency')->where(['id' =>$id]);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $titles = '';
            foreach($data as $row) {
                $titles['name']= $row['name'];
                $titles['hno']=$row['mail_house_no'];
                $titles['street']=$row['mail_street_address'];
                $titles['post']=$row['mail_p_office'];
                $titles['dist']=$this->distname($row['mail_district_id']);
                $titles['state']=$this->statename($row['mail_state_id']);
                $titles['pincode']=$row['mail_pincode'];
                
            }
            return $titles;
                
    }
    public function statename($id){
            $query = (new \yii\db\Query())->select(['name'])->from('_state')->where(['id' =>$id]);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $titles = '';
            foreach($data as $row) {
                $titles= $row['name'];
               
            }
            return $titles;
                
    }
    public function distname($id){
            $query = (new \yii\db\Query())->select(['name'])->from('_district')->where(['id' =>$id]);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $titles = '';
            foreach($data as $row) {
                $titles= $row['name'];
               
            }
            return $titles;
                
    }
    public function allrec($id,$oo,$ii) {
        //echo $oo;echo $ii;
        
             $query = (new \yii\db\Query())->select(['*'])->from('registered_posted_data')->where(['post_id'=>$id])->limit($oo)->offset($ii);
             $command = $query->createCommand();
          return   $data = $command->queryAll();
        
        
        
        
       // return $this->find()->where(['post_id'=>$id])->limit($oo)->offset($ii);
//        echo '<pre>';
//        print_r($val);
//        echo '</pre>';exit;
       // echo count($val);exit;
    }



}
