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
            [['agency_id', 'return_date', 'issue_type', 'pjy', 'org', 'issue_date', 'return_type'], 'integer']
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
            'return_date' => 'Return Date',
            'issue_type' => 'Issue Type',
            'pjy' => 'Pjy',
            'org' => 'Org',
            'issue_date' => 'Issue Date',
            'return_type' => 'Return Type',
        ];
    }
}
