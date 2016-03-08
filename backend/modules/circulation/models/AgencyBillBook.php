<?php

namespace backend\modules\circulation\models;

use Yii;

/**
 * This is the model class for table "agency_bill_book".
 *
 * @property integer $id
 * @property integer $agency_id
 * @property string $issue_date
 * @property integer $pjy
 * @property integer $org
 * @property string $total_copies
 * @property string $price_per_piece
 * @property string $total_price
 * @property string $discount
 * @property string $discounted_amt
 * @property string $final_total
 * @property string $credit_amt
 * @property string $credited_date
 * @property string $created_on
 */
class AgencyBillBook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agency_bill_book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agency_id', 'issue_date', 'pjy', 'org', 'total_copies', 'price_per_piece', 'total_price', 'discount', 'discounted_amt', 'final_total', 'created_on'], 'required'],
            [['agency_id', 'pjy', 'org'], 'integer'],
            [['issue_date', 'credited_date', 'created_on'], 'safe'],
            [['discount', 'discounted_amt', 'final_total', 'credit_amt'], 'number'],
            [['total_copies'], 'string', 'max' => 30],
            [['price_per_piece'], 'string', 'max' => 40],
            [['total_price'], 'string', 'max' => 50]
        ];
    }
     public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($this->isNewRecord){
            $dates=$this->getspecialeditiondates();
            
            if(!empty($dates)){
                //$allagencies=Yii::$app->mycomponent->calsunday();
                foreach($dates as $val){
                $agency=$this->get_all_agencies($val['date']);
                
                
                
                }
                
                
            
            }
            
            
            
        return true;
        }
        else{

            return true;
        } 
      
    }
    }
    private function get_all_agencies($date){
          $query = (new \yii\db\Query())->select(['*'])->from('agency')->where(['status' =>'Active']);
             $command = $query->createCommand();
             $data = $command->queryAll();
             $titles = '';
             foreach($data as $row) {
                 $titles['agency_id']= $row['agency_id'];
                 $titles['name']=$row['name'];
                 $titles['account_id']= $row['account_id'];
                 $titles['security_amt']=$row['security_amt'];
                 $titles['mail_post_office']= $row['mail_post_office'];
                 $titles['mail_state_id']=$row['mail_state_id'];
                 $titles['mail_country_id']= $row['mail_country_id'];
                 $titles['mail_district_id']=$row['mail_district_id'];
                 $titles['mail_pincode']= $row['mail_pincode'];
                 $pjy=$this->getcopiespjy($date,$row['id'],$row['route_id']);
                if($pjy!='Back'){
                 $titles['panchjanya']=$pjy;  
                }else{
                 $titles['panchjanya']=$row['panchjanya'];
                }
                 $org=$this->getcopiesorg($date,$row['id'],$row['route_id']);
                if($org!='Back'){
                 $titles['organiser']=$org;
                }
                else{
                 $titles['organiser']=$row['organiser'];;  
                }
                 $titles['agency_type']=$row['agency_type'];
                 $titles['commission']=$row['commission'];
             }
             return $titles;
        
    }
    private function getcopiespjy($date,$id,$dm) {
        
        if($dm=='1'){
                 $query = (new \yii\db\Query())->select(['pjy'])->from('ordinary_posted_data')->where(['agency_id' =>$id,'date'=>$date]);
             $command = $query->createCommand();
             $data = $command->queryAll();
             $titles = '';
             foreach($data as $row) {
                 $titles= $row['pjy'];
                 
             }
             return $titles;
        }
        elseif($dm=='2'){
                 $query = (new \yii\db\Query())->select(['pjy'])->from('registered_posted_data')->where(['agency_id' =>$id,'date'=>$date]);
             $command = $query->createCommand();
             $data = $command->queryAll();
             $titles = '';
             foreach($data as $row) {
                  $titles= $row['pjy'];
             }
             return $titles;
        }
        elseif($dm=='5'){
                 $query = (new \yii\db\Query())->select(['pjy'])->from('railway_posted_data')->where(['agency_id' =>$id,'date'=>$date]);
             $command = $query->createCommand();
             $data = $command->queryAll();
             $titles = '';
             foreach($data as $row) {
               $titles= $row['pjy'];
             }
             return $titles;
        }
        else{
            return 'Back';
        }
       
    }
    private function getcopiesorg($date,$id,$dm) {
          if($dm=='1'){
                 $query = (new \yii\db\Query())->select(['org'])->from('ordinary_posted_data')->where(['agency_id' =>$id,'date'=>$date]);
             $command = $query->createCommand();
             $data = $command->queryAll();
             $titles = '';
             foreach($data as $row) {
                 $titles= $row['org'];
                 
             }
             return $titles;
        }
        elseif($dm=='2'){
                 $query = (new \yii\db\Query())->select(['org'])->from('registered_posted_data')->where(['agency_id' =>$id,'date'=>$date]);
             $command = $query->createCommand();
             $data = $command->queryAll();
             $titles = '';
             foreach($data as $row) {
                  $titles= $row['org'];
             }
             return $titles;
        }
        elseif($dm=='5'){
                 $query = (new \yii\db\Query())->select(['org'])->from('railway_posted_data')->where(['agency_id' =>$id,'date'=>$date]);
             $command = $query->createCommand();
             $data = $command->queryAll();
             $titles = '';
             foreach($data as $row) {
               $titles= $row['org'];
             }
             return $titles;
        }
        else{
            return 'Back';
        }
        
    }


    
    private function getspecialeditiondates() {
        //return $statename.name;
        //     if($state_id!='2'){
             $query = (new \yii\db\Query())->select(['date'])->from('magazine_record_book')->where(['status' =>'0']);
             $command = $query->createCommand();
             $data = $command->queryAll();
             $titles = '';
             foreach($data as $row) {
                 $titles['date']= $row['date'];
                 $titles['price']=$row['price'];
             }
             return $titles;
            // return rtrim($titles, ', ');
        
        
        
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'agency_id' => 'Agency ID',
            'issue_date' => 'Issue Date',
            'pjy' => 'Pjy',
            'org' => 'Org',
            'total_copies' => 'Total Copies',
            'price_per_piece' => 'Price Per Piece',
            'total_price' => 'Total Price',
            'discount' => 'Discount',
            'discounted_amt' => 'Discounted Amt',
            'final_total' => 'Final Total',
            'credit_amt' => 'Credit Amt',
            'credited_date' => 'Credited Date',
            'created_on' => 'Created On',
        ];
    }
}
