<?php

namespace backend\modules\circulation\models;

use Yii;

/**
 * This is the model class for table "billing".
 *
 * @property integer $id
 * @property string $month
 * @property integer $no_of_issue
 */
class Billing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'billing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['month', 'no_of_issue'], 'required'],
            [['month'], 'safe'],
            [['no_of_issue'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'month' => 'Month',
            'no_of_issue' => 'No Of Issue',
        ];
    }
}
