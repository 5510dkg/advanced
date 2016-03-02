<?php

namespace backend\modules\circulation\models;

use Yii;

/**
 * This is the model class for table "agency_bill_book".
 *
 * @property integer $id
 * @property integer $agency_id
 * @property string $issue_date
 * @property integer $pjy
 * @property integer $org
 * @property string $total_copies
 * @property string $price_per_piece
 * @property string $total_price
 * @property string $discount
 * @property string $discounted_amt
 * @property string $final_total
 * @property string $credit_amt
 * @property string $credited_date
 * @property integer $pay_method
 * @property string $issue_type
 * @property string $previous_security_amt
 * @property string $received_security_amt
 * @property string $final_security_amt
 * @property string $created_on
 *
 * @property PaymentMode $payMethod
 */
class AgencyBillBook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agency_bill_book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agency_id', 'issue_date', 'pjy', 'org', 'total_copies', 'price_per_piece', 'total_price', 'discount', 'discounted_amt', 'final_total', 'issue_type', 'previous_security_amt', 'final_security_amt', 'created_on'], 'required'],
            [['agency_id', 'pjy', 'org', 'pay_method'], 'integer'],
            [['issue_date', 'credited_date', 'created_on'], 'safe'],
            [['discount', 'discounted_amt', 'final_total', 'credit_amt', 'previous_security_amt', 'received_security_amt', 'final_security_amt'], 'number'],
            [['issue_type'], 'string'],
            [['total_copies'], 'string', 'max' => 30],
            [['price_per_piece'], 'string', 'max' => 40],
            [['total_price'], 'string', 'max' => 50]
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
            'issue_date' => 'Issue Date',
            'pjy' => 'Pjy',
            'org' => 'Org',
            'total_copies' => 'Total Copies',
            'price_per_piece' => 'Price Per Piece',
            'total_price' => 'Total Price',
            'discount' => 'Discount',
            'discounted_amt' => 'Discounted Amt',
            'final_total' => 'Final Total',
            'credit_amt' => 'Credit Amt',
            'credited_date' => 'Credited Date',
            'pay_method' => 'Pay Method',
            'issue_type' => 'Issue Type',
            'previous_security_amt' => 'Previous Security Amt',
            'received_security_amt' => 'Received Security Amt',
            'final_security_amt' => 'Final Security Amt',
            'created_on' => 'Created On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayMethod()
    {
        return $this->hasOne(PaymentMode::className(), ['id' => 'pay_method']);
    }
}
