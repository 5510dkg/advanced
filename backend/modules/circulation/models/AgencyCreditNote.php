<?php

namespace backend\modules\circulation\models;

use Yii;

/**
 * This is the model class for table "agency_credit_note".
 *
 * @property integer $id
 * @property integer $agency_id
 * @property integer $return_date
 * @property integer $issue_type
 * @property integer $pjy
 * @property integer $org
 * @property integer $issue_date
 * @property integer $return_type
 */
class AgencyCreditNote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agency_credit_note';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agency_id', 'return_date', 'issue_type', 'pjy', 'org', 'issue_date', 'return_type'], 'required'],
            [['agency_id',  'pjy', 'org'], 'integer'],
            [['return_date','issue_date','return_type','issue_type'],'string']
        ];
    }
    
    
    public function get_agency($id,$date){
            $query = (new \yii\db\Query())->select(['id'])->from('agency_bill_book')->where(['agency_id' =>$id,'issue_date'=>$date]);
             $command = $query->createCommand();
             $data = $command->queryAll();
             $titles = '';
             foreach($data as $row) {
                  $titles= $row['id'];
             }
             return $titles;
    }
     public function get_agency_copy_price($id,$date){
            $query = (new \yii\db\Query())->select(['price_per_piece'])->from('agency_bill_book')->where(['agency_id' =>$id,'issue_date'=>$date]);
             $command = $query->createCommand();
             $data = $command->queryAll();
             $titles = '';
             foreach($data as $row) {
                  $titles= $row['price_per_piece'];
             }
             return $titles;
    }
     public function total($id,$date){
            $query = (new \yii\db\Query())->select(['final_total'])->from('agency_bill_book')->where(['agency_id' =>$id,'issue_date'=>$date]);
             $command = $query->createCommand();
             $data = $command->queryAll();
             $titles = '';
             foreach($data as $row) {
                  $titles= $row['final_total'];
             }
             return $titles;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'agency_id' => 'Agency ID',
            'return_date' => 'Return Date',
            'issue_type' => 'Issue Type',
            'pjy' => 'Pjy',
            'org' => 'Org',
            'issue_date' => 'Issue Date',
            'return_type' => 'Return Type',
        ];
    }
}
