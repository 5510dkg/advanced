<?php

namespace backend\modules\circulation\models;

use Yii;

/**
 * This is the model class for table "agency_commission".
 *
 * @property integer $id
 * @property integer $agency_id
 * @property string $amount
 * @property string $date
 *
 * @property Agency $agency
 */
class AgencyCommission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agency_commission';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agency_id', 'amount', 'date'], 'required'],
            [['agency_id'], 'integer'],
            [['date'], 'safe'],
            [['amount'], 'string', 'max' => 50]
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
            'amount' => 'Amount',
            'date' => 'Date',
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
