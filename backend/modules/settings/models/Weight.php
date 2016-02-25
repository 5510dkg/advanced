<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "_weight".
 *
 * @property integer $id
 * @property string $name
 * @property string $weight
 */
class Weight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '_weight';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'weight'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['weight'], 'string', 'max' => 20]
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
            'weight' => 'Weight',
        ];
    }
}
