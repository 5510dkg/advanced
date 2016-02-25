<?php

namespace backend\modules\settings\models;
use backend\modules\settings\models\DeliveryMethods;

use Yii;

/**
 * This is the model class for table "_bundle_size".
 *
 * @property integer $id
 * @property integer $delivery_method
 * @property integer $size
 */
class BundleSize extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '_bundle_size';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['delivery_method', 'size'], 'required'],
            [['id', 'delivery_method', 'size'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'delivery_method' => 'Delivery Method',
            'size' => 'Size',
        ];
    }

    public function getdeliverymethod(){
        return $this->hasone(DeliveryMethods::classname(),['id'=>'delivery_method']);
    }
}
