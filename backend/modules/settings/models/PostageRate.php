<?php

namespace backend\modules\settings\models;
use backend\modules\settings\models\DeliveryMethods;

use Yii;

/**
 * This is the model class for table "_postage_rate".
 *
 * @property integer $id
 * @property string $rate
 */
class PostageRate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '_postage_rate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rate','delivery_method'], 'required'],
            [['rate','delivery_method'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rate' => 'Rate',
            'delivery_method'=>'Delivery Method',
        ];
    }
    public function getdeliverymethods(){
        return $this->hasone(DeliveryMethods::classname(),['id'=>'delivery_method']);
    }
}
