<?php

namespace backend\modules\circulation\models;

use backend\modules\settings\models\Country;
use backend\modules\settings\models\State;
use backend\modules\settings\models\District;

use Yii;
ini_set('memory_limit', '-1');
/**
 * This is the model class for table "agency".
 *
 * @property integer $id
 * @property string $name
 * @property string $account_id
 * @property integer $route_id
 * @property integer $vehicle_id
 * @property string $reference
 * @property integer $email
 * @property integer $landline_no
 * @property integer $mobile_no
 * @property string $status
 * @property string $security_amt
 * @property integer $address_status
 * @property string $mail_house_no
 * @property string $mail_street_address
 * @property string $mail_p_office
 * @property integer $mail_country_id
 * @property integer $mail_state_id
 * @property integer $mail_district_id
 * @property integer $mail_pincode
 * @property integer $panchjanya
 * @property integer $organiser
 * @property string $add_house_no
 * @property string $add_street_address
 * @property string $add_p_office
 * @property integer $add_country_id
 * @property integer $add_state_id
 * @property integer $add_district_id
 * @property integer $add_pincode
 * @property string  $agency_type
 * @property string  $comment
 * * @property string  $billing_id
 * @property string  $commission
 * @property string  $issue_start_date
 * @property string  $agency_combined_id
 * @property string  $source
 * @property string  $tain_no
 * @property string  $train_name
 * @property string $title
 * @property AgencyCopiesRecords[] $agencyCopiesRecords
 * @property AgencyCreationUpdationRecords[] $agencyCreationUpdationRecords
 */
class Agency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agency';
    }
    const SCENARIO_CREATE = 'create';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','agency_type','mobile_no', 'mail_house_no', 'mail_street_address', 'mail_p_office','add_house_no','add_street_address','add_p_office','add_pincode','add_country_id', 'add_state_id', 'add_district_id' ,'mail_country_id', 'mail_state_id', 'mail_district_id', 'mail_pincode','commission','agency_type','route_id'], 'required'],
            [['title','name','billing_id','vehicle_id' ,'status','agency_type','commission','comment','issue_start_date','mail_street_address', 'add_street_address','agency_combined_id','train_no','train_name','source'], 'string'],
            [['route_id',  'landline_no', 'mobile_no', 'mail_country_id', 'mail_state_id', 'mail_district_id', 'mail_pincode', 'panchjanya', 'organiser', 'add_country_id', 'add_state_id', 'add_district_id', 'add_pincode'], 'integer'],
            [['security_amt'], 'number'],

           
            [['account_id','email','address_status'], 'string', 'max' => 110],
            [['reference', 'mail_house_no', 'mail_p_office', 'add_house_no', 'add_p_office'], 'string', 'max' => 255]
        ];
    }
    
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = [];

        return $scenarios;
    }
    
     /*
     * excel file creation for weekly supply
     */
    public function get_all_excel_record($from_dt,$to_date,$state=NULL,$po=NULL){
             
             $query = (new \yii\db\Query())->select('*,_delivery_methods.name as rname,agency.id as id,agency.name as name')->from('agency')->innerJoin('_delivery_methods',
                     '_delivery_methods.id=agency.route_id');
             $query->andFilterWhere([
            'mail_state_id' => $state,
            'mail_p_office' => $po,
          
        ]);
             $command = $query->createCommand();
             $data = $command->queryAll();
             
             foreach($data as $row) {
                 
                 $id= $row['id'];
                 $out[$id]['name']=$row['name'];
                 $out[$id]['mobile_no']=$row['mobile_no'];
                 $out[$id]['mail_street_address']=$row['mail_street_address'];
                 $out[$id]['mail_p_office']=$row['mail_p_office'];
                 $out[$id]['account_id']=$row['account_id'];
                 $out[$id]['rname']=$row['rname'];
                 if($row['route_id']==1){
                     $out[$id]['copy']=$this->getorddata($id,$from_dt,$to_date);
                 }
                 elseif($row['route_id']==2){
                      $out[$id]['copy']=$this->getregddata($id,$from_dt,$to_date);
                 }
                 elseif($row['route_id']==4){
                   
                      $out[$id]['copy']=$this->getvppdata($id,$from_dt,$to_date);
                 }
                 elseif($row['route_id']==5){
                      $out[$id]['copy']=$this->getraildata($id,$from_dt,$to_date);
                 }
                 else{
                      $out[$id]['copy']=$this->getdata($id,$from_dt,$to_date);
                 }
                 
                 
               
             }
             return $out;
             // print_r($out);exit;
        
    }
    /*
     * get data
     */
    public function getdata($id,$from_dt,$to_date){
        $out='';
        $query = (new \yii\db\Query())->select('*')->from('agency')->Where(['id'=>$id])->orderBy('id ASC');
             $command = $query->createCommand();
             $data = $command->queryAll();
             
              $i=1;
             foreach($data as $row) {
                 
                 $out[$i]['pjy']=$row['panchjanya'];
                 $out[$i]['org']=$row['organiser'];
            $i++; }
             return $out;
            // print_r($out);exit;
        
    }
    /*
     * get data
     */
    public function getorddata($id,$from_dt,$to_date){
        $out='';
        $query = (new \yii\db\Query())->select('*')->from('ordinary_posted_data')->where(['between', 'date',$from_dt, $to_date])->andWhere(['agency_id'=>$id])->groupBy('date')->orderBy('date ASC');
             $command = $query->createCommand();
             $data = $command->queryAll();
             
              $i=1;
             foreach($data as $row) {
                 if($row['pjy']=='' || $row['pjy']==NULL){
                     $row['pjy']=0;
                 }
                 if($row['org']=='' || $row['org']==NULL){
                     $row['org']=0;
                 }
                 $out[$i]['pjy']=$row['pjy'];
                 $out[$i]['org']=$row['org'];
            $i++; }
             return $out;
            // print_r($out);exit;
        
    }
    /*
     * get data
     */
    public function getregddata($id,$from_dt,$to_date){
        $out='';
        $query = (new \yii\db\Query())->select('*')->from('registered_posted_data')->where(['between', 'date',$from_dt, $to_date])->andWhere(['agency_id'=>$id])->groupBy('date')->orderBy('date ASC');
             $command = $query->createCommand();
             $data = $command->queryAll();
             
              $i=1;
             foreach($data as $row) {
                 if($row['pjy']=='' || $row['pjy']==NULL){
                     $row['pjy']=0;
                 }
                 if($row['org']=='' || $row['org']==NULL){
                     $row['org']=0;
                 }
                 $out[$i]['pjy']=$row['pjy'];
                 $out[$i]['org']=$row['org'];
            $i++; }
             return $out;
            // print_r($out);exit;
        
    }
    /*
     * get data
     */
    public function getvppdata($id,$from_dt,$to_date){
        $out='';
        $query = (new \yii\db\Query())->select('*')->from('vpp_posted_data')->where(['between', 'date',$from_dt, $to_date])->andWhere(['agency_id'=>$id])->groupBy('date')->orderBy('date ASC');
             $command = $query->createCommand();
             $data = $command->queryAll();
             
              $i=1;
             foreach($data as $row) {
                 if($row['pjy']=='' || $row['pjy']==NULL){
                     $row['pjy']=0;
                 }
                 if($row['org']=='' || $row['org']==NULL){
                     $row['org']=0;
                 }
                 $out[$i]['pjy']=$row['pjy'];
                 $out[$i]['org']=$row['org'];
            $i++;
            }
           
             return $out;
            // print_r($out);exit;
        
    }
    
    /*
     * get data
     */
    public function getraildata($id,$from_dt,$to_date){
        $out='';
        $query = (new \yii\db\Query())->select('*')->from('railway_posted_data')->where(['between', 'date',$from_dt, $to_date])->andWhere(['agency_id'=>$id])->groupBy('date')->orderBy('date ASC');
             $command = $query->createCommand();
             $data = $command->queryAll();
             
              $i=1;
             foreach($data as $row) {
                 if($row['pjy']=='' || $row['pjy']==NULL){
                     $row['pjy']=0;
                 }
                 if($row['org']=='' || $row['org']==NULL){
                     $row['org']=0;
                 }
                 $out[$i]['pjy']=$row['pjy'];
                 $out[$i]['org']=$row['org'];
            $i++; }
             return $out;
            // print_r($out);exit;
        
    }
    
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'account_id' => 'Supply Id ',
            'route_id' => 'Delivery Method ',
            'vehicle_id' => 'Vehicle ',
            'reference' => 'Reference',
            'email' => 'Email',
            'landline_no' => 'Landline No',
            'mobile_no' => 'Mobile No',
            'status' => 'Status',
            'security_amt' => 'Security Amt',
            'address_status' => 'Same As Mailing Address',
            'mail_house_no' => 'House No\Name',
            'mail_street_address' => 'Street Address',
            'mail_p_office' => 'Post Office',
            'mail_country_id' => 'Country ',
            'mail_state_id' => 'State ',
            'mail_district_id' => 'District',
            'mail_pincode' => 'Pincode',
            'panchjanya' => 'Panchjanya',
            'organiser' => 'Organiser',
            'add_house_no' => 'House No\Name',
            'add_street_address' => 'Street Address',
            'add_p_office' => 'Post Office',
            'add_country_id' => 'Country ',
            'add_state_id' => 'State ',
            'add_district_id' => 'District ',
            'add_pincode' => 'Pincode',
            'commission'=>'Commission',
            'issue_start_date'=>'Issue Start Date',
            'comment'=>'Comment',
            'agency_type'=>'Agency Type',
            'agency_combined_id'=>'Account Id',
            'train_no'=>'Train Number',
            'source'=>'Source',
            'train_name'=>'Train Name',
            'billing_id'=>'Billing Id',
            'title'=>'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgencyCopiesRecords()
    {
        return $this->hasMany(AgencyCopiesRecords::className(), ['agency_id' => 'id']);
    }

    /*
     * get state name according to district name
     */
    public function getstatename($name){
        $query = (new \yii\db\Query())->select(['id'])->from('_district')->where(['like', 'name',$name])->limit(1);
             $command = $query->createCommand();
             $data = $command->queryAll();
             $titles = '';
             foreach($data as $row) {
                 $titles = $row['id'];
             }
             return $titles;
    }
    
    
    
    /**
     *  before save
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($this->isNewRecord){
            $ct=$this->find()->all();
            $cty=count($ct);
            $num=$cty+1;
            $st=$this->getshortnamestate($this->mail_state_id);
           // print_r($st);
            //$st=$st['name'];
            $st=strtoupper($st);
            $atyp=$this->agency_type;
            if($atyp=='Single'){
               
                $atype='S';
            }else{$atype='C';}
            
            $mystate=mb_substr($st, 0, 2);
            $num=str_pad($num, 5, '0', STR_PAD_LEFT);
            $this->account_id=$mystate.'|'.$atype.'|'.$num;
             if($atyp=='Single'){
                 $this->billing_id=$mystate.'|'.$atype.'|'.$num;
             }elseif($atyp=='Combined'){
                 $this->billing_id=$this->agency_combined_id;
             }else{
                 $this->billing_id=$this->account_id;
             }
            
            
        return true;
        }
        else{

            return true;
        } 
      
    }
    }

    private function getshortnamestate($state_id){
        //return $statename.name;
        //     if($state_id!='2'){
        //     $query = (new \yii\db\Query())->select(['name'])->from('_state')->where(['id' =>$state_id]);
        //     $command = $query->createCommand();
        //     $data = $command->queryAll();
        //     $titles = '';
        //     foreach($data as $row) {
        //         $titles .= $row['name'] . ', ';
        //     }
        //     return rtrim($titles, ', ');
        // }
        // else {
        //     return 'AP';
        // }

        if($state_id=='1'){return 'AN';}
        if($state_id=='2'){return 'AP';}
        if($state_id=='3'){return 'AR';}
        if($state_id=='4'){return 'AS';}
        if($state_id=='5'){return 'BR';}
        if($state_id=='6'){return 'CG';}
        if($state_id=='7'){return 'CH';}
        if($state_id=='8'){return 'DN';}
        if($state_id=='9'){return 'DD';}
        if($state_id=='10'){return 'DL';}
        if($state_id=='11'){return 'GA';}
        if($state_id=='12'){return 'GJ';}
        if($state_id=='13'){return 'HR';}
        if($state_id=='14'){return 'HP';}
        if($state_id=='15'){return 'JK';}
        if($state_id=='16'){return 'JH';}
        if($state_id=='17'){return 'KA';}
        if($state_id=='18'){return 'KL';}
        if($state_id=='19'){return 'LD';}
        if($state_id=='20'){return 'MP';}
        if($state_id=='21'){return 'MH';}
        if($state_id=='22'){return 'MN';}
        if($state_id=='23'){return 'ML';}
        if($state_id=='24'){return 'MZ';}
        if($state_id=='25'){return 'NL';}
        if($state_id=='26'){return 'OD';}
        if($state_id=='27'){return 'PY';}
        if($state_id=='28'){return 'PB';}
        if($state_id=='29'){return 'RJ';}
        if($state_id=='30'){return 'SK';}
        if($state_id=='31'){return 'TN';}
        if($state_id=='32'){return 'TS';}
        if($state_id=='33'){return 'TR';}
        if($state_id=='34'){return 'UP';}
        if($state_id=='35'){return 'UK';}
        if($state_id=='36'){return 'WB';}



    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgencyCreationUpdationRecords()
    {
        return $this->hasMany(AgencyCreationUpdationRecords::className(), ['agency_id' => 'id']);
    }
    public function getCountry()
    {
        return $this->hasone(Country::classname(),['id'=>'mail_country_id']);
    }

    public function getStates()
    {
        return $this->hasone(State::classname(),['id'=>'add_state_id']);
    }
     public function getState()
    {
        return $this->hasone(State::classname(),['id'=>'mail_state_id']);
    }
    public function getDistrict()
    {
        return $this->hasone(District::classname(),['id'=>'mail_district_id']);
    }
    
    public function getDeliveryMethods()
    {
        return $this->hasone(\backend\modules\settings\models\DeliveryMethods::classname(),['id'=>'route_id']);
    }
    
    public function getDistrictid($name){
        
               $query = (new \yii\db\Query())->select(['id'])->from('_district')->where(['like','name',$name]);
             $command = $query->createCommand();
             $data = $command->queryAll();
             $titles = '';
             foreach($data as $row) {
                 $titles = $row['id'];
             }
             
             return $titles;
    }
    
    public function getDistricts()
    {
        return $this->hasone(District::classname(),['id'=>'add_district_id']);
    }



                        // $agencyaddress->h_no=$model->mail_house_no;
                        // $agencyaddress->street_address=$model->mail_street_address;
                        // $agencyaddress->p_office=$model->mail_p_office;
                        // $agencyaddress->country_id=$model->mail_country_id;
                        // $agencyaddress->state_id=$model->mail_state_id;
                        // $agencyaddress->district_id=$model->mail_district_id;
                        // $agencyaddress->pincode=$model->mail_pincode;
                        // $agencyaddress->agency_id=$model->id;
                        // $agencyaddress->full_name=$model->name;
                        // $agencyaddress->save();
    // /**
    //  * @inheritdoc
    //  */
    // public function beforeSave($insert)
    // {
    //     if (parent::beforeSave($insert)) {
    //         // Place your custom code here


    //         return true;
    //     } else {
    //         return false;
    //     }
    // }






}
