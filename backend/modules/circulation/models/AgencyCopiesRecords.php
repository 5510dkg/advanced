<?php

namespace backend\modules\circulation\models;

use Yii;

/**
 * This is the model class for table "agency_copies_records".
 *
 * @property integer $agency_id
 * @property string $date
 * @property integer $pachjanya
 * @property integer $organiser
 * @property integer $id
 *
 * @property Agency $agency
 */
class AgencyCopiesRecords extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agency_copies_records';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agency_id', 'date', 'pachjanya', 'organiser'], 'required'],
            [['agency_id', 'pachjanya', 'organiser'], 'integer'],
            [['date'], 'safe']
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
            'pachjanya' => 'Pachjanya',
            'organiser' => 'Organiser',
            'id' => 'ID',
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
