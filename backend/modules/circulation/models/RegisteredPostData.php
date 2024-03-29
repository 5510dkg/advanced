<?php

namespace backend\modules\circulation\models;

use Yii;
use backend\modules\circulation\models\RegisteredPostedData;
use backend\modules\settings\models\Weight;
use backend\modules\settings\models\PostageRate;
use backend\modules\circulation\models\Agency;

/**
 * This is the model class for table "registered_post_data".
 *
 * @property integer $id
 * @property string $date
 * @property string $time
 * @property string $generated_date
 */
class RegisteredPostData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'registered_post_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'required'],
          //  [['date'], 'unique'],
            [['date', 'time','generated_date'], 'safe']
        ];
    }

     /**
     *  before save
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $lid=$this->lastid();
            $postage=new RegisteredPostedData();
           // $i=1;
            $agencydata=$this->agencylist();
          //  var_dump($agencydata);exit;
            //echo var_dump($agencydata);
            foreach ($agencydata as $value) {
                $postage->id = NULL;
                $postage->isNewRecord = TRUE; 
                $postage->agency_id=$value['id'];
                $postage->tempelate_id='1';
                $wt=$this->weight($value['panchjanya'],$value['organiser']);
                $postage->wt=$wt;
                $postage->postage=$this->postage($wt);
                $postage->address_bar=$value['name'].' ,'.$value['mail_street_address'];
                $postage->sn=$lid++;
                $postage->pjy=$value['panchjanya'];
                $postage->org=$value['organiser'];
                $postage->date=$this->date;
                $postage->state=$value['mail_state_id'];
                $postage->district=$value['mail_district_id'];
                $postage->postoffice=$value['mail_p_office'];
                $postage->state_id=$value['mail_state_id'];
                $postage->district_id=$value['mail_district_id'];
                $postage->post_office=$value['mail_p_office'];
                $postage->post_id=$this->getnextid();
                if($value['panchjanya']>0){
                    $postage->license=$this->getlicense('PJY');
                }
                else{
                    $postage->license=$this->getlicense('ORG');
                }
                $postage->bundle_size=$this->getbundle_size('2');
                $postage->save(false);
              //  $i++;
                }

                $this->generated_date=date("Y-m-d");
                $this->time=date("H:i:s");            
            
        return true;
        }
        else{

            return true;
        } 
      
    }
    private function getlicense($id){
           $query = (new \yii\db\Query())->select(['license'])->from('_license')->where(['product_id' =>$id]);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $titles = '';
            foreach($data as $row) {
                $titles = $row['license'];
             }
             return $titles;

    }
    private function getbundle_size($id){
           $query = (new \yii\db\Query())->select(['size'])->from('_bundle_size')->where(['delivery_method' =>$id]);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $titles = '';
            foreach($data as $row) {
                $titles = $row['size'];
             }
             return $titles;

    }
     private function lastid(){

            $query = (new \yii\db\Query())->select(['sn'])->from('registered_posted_data');
            $command = $query->createCommand();
            $data = $command->queryAll();
            $titles = '';
            foreach($data as $row) {
                $titles[] = $row['sn'];
             }
             if(!empty($titles)){
             $m=max($titles);
         }
            else $m=0;
             $r=$m+1;
             return $r;
    }
    



    private function getnextid(){

            $query = (new \yii\db\Query())->select(['id'])->from('registered_post_data');
            $command = $query->createCommand();
            $data = $command->queryAll();
            $titles = '';
            foreach($data as $row) {
                $titles[] = $row['id'];
             }
             if(!empty($titles)){
             $m=max($titles);
         }
            else $m=0;
             $r=$m+1;
             return $r;
    }
    public function postage($wt){
        
        $r=$this->postageweight();
        $tot=$wt*$r;
        return $tot;

    }
    public function weight($pjy,$org){
            $p=$this->pjyweight();
           // $p=$pw['weight'];
            $o=$this->orgweight();
          //  $o=$this->weight();
            $pjyy=$pjy*$p;
            $orgg=$org*$o;
            $total=$pjyy+$orgg;
            return $total;
    }
    public function postageweight(){
            $query = (new \yii\db\Query())->select(['rate'])->from('_postage_rate')->where(['delivery_method' =>'2']);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $titles = '';
            foreach($data as $row) {
                $titles = $row['rate'];
             }
             return $titles;
    }
    public function pjyweight(){
            $query = (new \yii\db\Query())->select(['weight'])->from('_weight')->where(['name' =>'PJY']);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $titles = '';
            foreach($data as $row) {
                $titles = $row['weight'];
             }
             return $titles;
    }
    public function orgweight(){
          $query = (new \yii\db\Query())->select(['weight'])->from('_weight')->where(['name' =>'ORG']);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $titles = '';
            foreach($data as $row) {
                $titles = $row['weight'];
             }
             return $titles;
    }
    
    public function agencylist(){

           $query = (new \yii\db\Query())->select('*')->from('agency')->where(['route_id' =>'2'])->orderBy('mail_state_id');
            $command = $query->createCommand();
            return $command->queryAll();
        //return Agency::find()->where('route_id=2')->all();

    }
   

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'time' => 'Time',
            'generated_date'=>'generated Date',
        ];
    }
     public function singleagencylist($id){

           $query = (new \yii\db\Query())->select('*')->from('agency')->where(['id' =>$id])->orderBy('mail_state_id');
            $command = $query->createCommand();
            return $command->queryAll();
        //return Agency::find()->where('route_id=2')->all();

    }
}
