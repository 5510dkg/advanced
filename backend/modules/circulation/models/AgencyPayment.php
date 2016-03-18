<?php

namespace backend\modules\circulation\models;

use Yii;

/**
 * This is the model class for table "agency_payment".
 *
 * @property integer $id
 * @property integer $agency_id
 * @property string $bill_number
 * @property double $amount
 * @property string $month
 * @property double $balance
 * @property integer $payment_mode
 * @property string $payment_detail
 * @property string $comment
 */
class AgencyPayment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agency_payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agency_id', 'bill_number', 'amount', 'month', 'balance', 'payment_mode', 'payment_detail', 'comment'], 'required'],
            [['agency_id', 'payment_mode'], 'integer'],
            [['amount', 'balance'], 'number'],
            [['month'], 'safe'],
            [['payment_detail', 'comment'], 'string'],
            [['bill_number'], 'string', 'max' => 250]
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
            'bill_number' => 'Bill Number',
            'amount' => 'Amount',
            'month' => 'Month',
            'balance' => 'Balance',
            'payment_mode' => 'Payment Mode',
            'payment_detail' => 'Payment Detail',
            'comment' => 'Comment',
        ];
    }

    /**
     * @inheritdoc
     * @return AgencyPaymentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AgencyPaymentQuery(get_called_class());
    }
}
