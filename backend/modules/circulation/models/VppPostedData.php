<?php

namespace backend\modules\circulation\models;

use Yii;

/**
 * This is the model class for table "vpp_posted_data".
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
 * @property integer $vpp_id
 * @property string $license
 * @property integer $bundle_size
 * @property string $state
 * @property string $district
 * @property string $postoffice
 * @property integer $state_id
 * @property integer $district_id
 * @property string $post_office
 */
class VppPostedData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vpp_posted_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agency_id', 'tempelate_id', 'wt', 'postage', 'address_bar', 'sn', 'pjy', 'org', 'date', 'vpp_id', 'bundle_size', 'state', 'district', 'postoffice', 'state_id', 'district_id', 'post_office'], 'required'],
            [['agency_id', 'tempelate_id', 'pjy', 'org', 'vpp_id', 'bundle_size', 'state_id', 'district_id'], 'integer'],
            [['address_bar', 'license'], 'string'],
            [['date'], 'safe'],
            [['wt', 'postage', 'sn'], 'string', 'max' => 30],
            [['state'], 'string', 'max' => 90],
            [['district', 'postoffice', 'post_office'], 'string', 'max' => 110],
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
            'vpp_id' => 'Vpp ID',
            'license' => 'License',
            'bundle_size' => 'Bundle Size',
            'state' => 'State',
            'district' => 'District',
            'postoffice' => 'Postoffice',
            'state_id' => 'State ID',
            'district_id' => 'District ID',
            'post_office' => 'Post Office',
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
        if (($model = $this->find->where(['vpp_id'=>$id])->all()) !== null) {
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
                $titles['source']=$row['source'];
                $titles['train_name']=$row['train_name'];
                $titles['train_no']=$row['train_no'];
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
    
      public function pjyweight(){
            $query = (new \yii\db\Query())->select(['weight'])->from('_weight')->where(['name' =>'PJY']);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $titles = '';
            foreach($data as $row) {
                $titles= $row['weight'];
               
            }
            return $titles;
                
    }
     public function orgweight(){
            $query = (new \yii\db\Query())->select(['weight'])->from('_weight')->where(['name' =>'ORG']);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $titles = '';
            foreach($data as $row) {
                $titles= $row['weight'];
               
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
}
