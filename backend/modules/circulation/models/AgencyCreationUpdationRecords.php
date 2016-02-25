<?php

namespace backend\modules\circulation\models;

use Yii;

/**
 * This is the model class for table "agency_creation_updation_records".
 *
 * @property integer $agency_id
 * @property string $date
 * @property integer $status
 * @property integer $id
 * @property string $time
 *
 * @property Agency $agency
 */
class AgencyCreationUpdationRecords extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agency_creation_updation_records';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agency_id', 'date', 'status', 'time'], 'required'],
            [['agency_id', 'status'], 'integer'],
            [['date', 'time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'agency_id' => 'Agency ID',
            'date' => 'Date',
            'status' => 'Status',
            'id' => 'ID',
            'time' => 'Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgency()
    {
        return $this->hasOne(Agency::className(), ['id' => 'agency_id']);
    }
}
