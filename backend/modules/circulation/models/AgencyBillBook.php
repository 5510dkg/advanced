<?php

namespace backend\modules\circulation\models;

use Yii;
use backend\modules\circulation\models\Agency;
//use backend\modules\circulation\models\AgencyBillBook;

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
    const SCENARIO_CREATE = 'insert';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['agency_id', 'issue_date', 'pjy', 'org', 'total_copies', 'price_per_piece', 'total_price', 'discount', 'discounted_amt', 'final_total', 'created_on'], 'required'],
//            [['agency_id', 'pjy', 'org'], 'integer'],
//            [['issue_date', 'credited_date', 'created_on'], 'safe'],
//            [['discount', 'discounted_amt', 'final_total', 'credit_amt'], 'number'],
//            [['total_copies'], 'string', 'max' => 30],
//            [['price_per_piece'], 'string', 'max' => 40],
//            [['total_price'], 'string', 'max' => 50]
        ];
    }
  public function scenarios()
{
    $scenarios = parent::scenarios();
    $scenarios[self::SCENARIO_CREATE] = [['issue_date'], 'unique'];

    return $scenarios;
}
//     public function beforeSave($insert)
//    {
//        if (parent::beforeSave($insert)) {
//           
//            $dates=$this->getspecialeditiondates();
//            
//            if(!empty($dates)){
//                //$allagencies=Yii::$app->mycomponent->calsunday();
//                foreach($dates as $k=>$v){
//                $agency=$this->get_all_agencies($v['date']);
//                //echo count($agency);exit;
//               // echo'<pre>';
//               // print_r($agency);exit;
//               // echo '</pre>';
//                $i=1;
//                foreach ($agency as $key=> $val) {
//                   // echo $i;
//                    $this->isNewRecord = TRUE; 
//                    $this->agency_id=$val['agency_id'];
//                    $this->issue_date=$v['date'];
//                    $this->pjy=$val['panchjanya'];
//                    $this->org=$val['organiser'];
//                    $this->total_copies=$val['panchjanya']+$val['organiser'];
//                    $this->price_per_piece=$v['price'];
//                    $tot=$val['panchjanya']+$val['organiser'];
//                    $price=($val['panchjanya']+$val['organiser'])*$v['price'];
//                    $this->total_price=$price;
//                    $dsc=$this->get_discount($tot);
//                    $per=($price*$dsc)/100;
//                    $this->discount=$dsc;
//                    $discounted=$price-$per;
//                    $this->discounted_amt=$per;
//                    $this->final_total=$discounted;
//                    $this->created_on=  date('Y-m-d H:i:s');
//                    
//                    return TRUE;
//                  //  $i++;
//                  }
//                }
//            }
//        }
//    }
    
    public function get_discount($copy) {
          $query = (new \yii\db\Query())->select(['*'])->from('commission_cal');
             $command = $query->createCommand();
             $data = $command->queryAll();
             $dsc = '';
             foreach($data as $row) {
                    if($copy>$row['lower_limit'] && $copy< $row['upper_limit']){
                        $dsc=$row['amt'];
                    }
                 
             }
             return $dsc;
        
        
    }
    public function get_records($dd) {
          $query = (new \yii\db\Query())->select(['COUNT(id) as ct'])->from('agency_bill_book')->where(''
                  . 'DATE_FORMAT(issue_date,"%Y-%m")="'.$dd.'"');
             $command = $query->createCommand();
             $data = $command->queryAll();
             $dsc = '';
             foreach($data as $row) {
                $dsc= $row['ct'];
                 
             }
           return $dsc; 
        
        
    }
    
    public function get_all_agencies($date){
          $query = (new \yii\db\Query())->select(['*'])->from('agency')->where(['status' =>'Active']);
             $command = $query->createCommand();
             $data = $command->queryAll();
             $titles = '';
             $inc=1;
             foreach($data as $row) {
                 $id=$row['id'].$inc;
                 $titles[$id]['agency_id']= $row['id'];
                 $titles[$id]['name']=$row['name'];
                 $titles[$id]['account_id']= $row['account_id'];
                 $titles[$id]['security_amt']=$row['security_amt'];
                 $titles[$id]['mail_post_office']= $row['mail_p_office'];
                 $titles[$id]['mail_state_id']=$row['mail_state_id'];
                 $titles[$id]['mail_country_id']= $row['mail_country_id'];
                 $titles[$id]['mail_district_id']=$row['mail_district_id'];
                 $titles[$id]['mail_pincode']= $row['mail_pincode'];
                 $pjy=$this->getcopiespjy($date,$row['id'],$row['route_id']);
                if($pjy!='Back'){
                 $titles[$id]['panchjanya']=$pjy;  
                }else{
                 $titles[$id]['panchjanya']=$row['panchjanya'];
                }
                 $org=$this->getcopiesorg($date,$row['id'],$row['route_id']);
                if($org!='Back'){
                 $titles[$id]['organiser']=$org;
                }
                else{
                 $titles[$id]['organiser']=$row['organiser'];;  
                }
                 $titles[$id]['agency_type']=$row['agency_type'];
                 $titles[$id]['commission']=$row['commission'];
             }
             return $titles;
        
    }
    public function getBill($month){
                $month=date('Ym');
             $query = (new \yii\db\Query())->select(['DATE_FORMAT(issue_date,"%Y%m") as month,agency.id as agencyid,agency.name as name,SUM(PJY) as pjy,SUM(org) as org,SUM(total_copies) as total_copies,SUM(total_price) as total_price,SUM(discounted_amt) as discounted_amt,SUM(final_total) as final_amt'])->from('agency_bill_book')->innerJoin('agency','agency.id=agency_bill_book.agency_id')->where('DATE_FORMAT(issue_date,"%Y%m")="'.$month.'"')->groupBy('agency_id');
             $command = $query->createCommand();
             return $data = $command->queryAll();
            // $titles = '';
             
    }
    
    public function getcopiespjy($date,$id,$dm) {
        
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
    public function getcopiesorg($date,$id,$dm) {
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


    
    public function getspecialeditiondates() {
        //return $statename.name;
        //     if($state_id!='2'){
             $query = (new \yii\db\Query())->select(['*'])->from('magazine_record_book')->where(['status' =>'0']);
             $command = $query->createCommand();
             $data = $command->queryAll();
             $titles = '';
             foreach($data as $row) {
                 $id=$row['id'];
                 $titles[$id]['date']= $row['date'];
                 $titles[$id]['price']=$row['price'];
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
            'price_per_piece' => 'Price Per Unit',
            'total_price' => 'Net Amount',
            'discount' => 'Discount',
            'discounted_amt' => 'Discounted Amt',
            'final_total' => 'Final Amount',
            'credit_amt' => 'Credit Amt',
            'credited_date' => 'Credited Date',
            'created_on' => 'Created On',
        ];
    }
    
    
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getagencyname()
    {
        return $this->hasone(Agency::className(), ['id' => 'agency_id']);
    }
    
    
    public function getDetails($month,$agency_id){
         $query = (new \yii\db\Query())->select(['discount as discount,price_per_piece as unitprice,DATE_FORMAT(issue_date,"%d-%b-%y") as date,agency.id as agencyid,agency.name as name,agency_bill_book.pjy as pjy,agency_bill_book.org as org,total_copies,total_price,discounted_amt,final_total'])->from('agency_bill_book')->innerJoin('agency','agency.id=agency_bill_book.agency_id')->where(['DATE_FORMAT(issue_date,"%Y%m")'=>$month,'agency_id'=>$agency_id]);
             $command = $query->createCommand();
             return $data = $command->queryAll();
            // $titles = '';
        
    }
    public function getPrintdetails($month,$agency_id){
         $query = (new \yii\db\Query())->select(['*,discount as discount,price_per_piece as unitprice,DATE_FORMAT(issue_date,"%M-%Y") as months,DATE_FORMAT(issue_date,"%d-%b-%y") as date,agency.id as agencyid,agency.name as name,agency_bill_book.pjy as pjy,agency_bill_book.org as org,total_copies,total_price,discounted_amt,final_total'])->from('agency_bill_book')->innerJoin('agency','agency.id=agency_bill_book.agency_id')->where(['DATE_FORMAT(issue_date,"%Y%m")'=>$month,'agency_id'=>$agency_id]);
             $command = $query->createCommand();
             return $data = $command->queryAll();
            // $titles = '';
        
    }
    
    
    public function getAgency() {
        return $this->hasone(Agency::classname(),['id'=>'agency_id']);
        
    }
}
