<?php

namespace backend\modules\circulation\models;

use Yii;

/**
 * This is the model class for table "magazine_record_book".
 *
 * @property integer $id
 * @property string $date
 * @property string $issue_type
 * @property string $price
 * @property integer $status
 */
class MagazineRecordBook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'magazine_record_book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'issue_type', 'price'], 'required'],
            [['date'], 'safe'],
            [['issue_type'], 'string'],
            [['price'], 'number'],
            [['status'], 'integer'],
            [['date'], 'unique']
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
            'issue_type' => 'Issue Type',
            'price' => 'Price',
            'status' => 'Status',
        ];
    }
}
