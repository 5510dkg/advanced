<?php

namespace backend\modules\circulation\models;

use Yii;

/**
 * This is the model class for table "agency_receipt".
 *
 * @property integer $id
 * @property integer $agency_id
 * @property string $rcpt_date
 * @property string $cr_amt
 * @property integer $payment_mode
 * @property string $comment
 * @property string $created_on
 * @property string $created_on_time
 */
class AgencyReceipt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agency_receipt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agency_id', 'rcpt_date', 'cr_amt', 'payment_mode', 'comment', 'created_on', 'created_on_time'], 'required'],
            [['agency_id', 'payment_mode'], 'integer'],
            [['rcpt_date', 'created_on', 'created_on_time'], 'safe'],
            [['cr_amt'], 'number'],
            [['comment'], 'string']
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
            'rcpt_date' => 'Rcpt Date',
            'cr_amt' => 'Cr Amt',
            'payment_mode' => 'Payment Mode',
            'comment' => 'Comment',
            'created_on' => 'Created On',
            'created_on_time' => 'Created On Time',
        ];
    }
}
