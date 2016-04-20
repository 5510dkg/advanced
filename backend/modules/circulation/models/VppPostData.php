<?php

namespace backend\modules\circulation\models;

use Yii;

/**
 * This is the model class for table "vpp_post_data".
 *
 * @property integer $id
 * @property string $date
 * @property string $time
 * @property string $generated_date
 */
class VppPostData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vpp_post_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'time', 'generated_date'], 'required'],
            [['date', 'time', 'generated_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'time' => 'Time',
            'generated_date' => 'Generated Date',
        ];
    }
}
