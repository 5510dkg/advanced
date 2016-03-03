<?php

namespace backend\modules\circulation\models;

use Yii;

/**
 * This is the model class for table "commission_cal".
 *
 * @property integer $id
 * @property integer $lower_limit
 * @property integer $upper_limit
 * @property double $amt
 */
class CommissionCal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'commission_cal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lower_limit', 'upper_limit', 'amt'], 'required'],
            [['lower_limit', 'upper_limit'], 'integer'],
            [['amt'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lower_limit' => 'Lower Limit',
            'upper_limit' => 'Upper Limit',
            'amt' => 'Amt',
        ];
    }
}
