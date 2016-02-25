<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "_license".
 *
 * @property integer $id
 * @property string $product_id
 * @property string $license
 */
class License extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '_license';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'license'], 'required'],
            [['product_id', 'license'], 'string'],
            [['product_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'license' => 'License',
        ];
    }
}
