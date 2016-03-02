<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "_payment_mode".
 *
 * @property integer $id
 * @property string $name
 *
 * @property AgencyBillBook[] $agencyBillBooks
 */
class PaymentMode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '_payment_mode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 110]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgencyBillBooks()
    {
        return $this->hasMany(AgencyBillBook::className(), ['pay_method' => 'id']);
    }
}
