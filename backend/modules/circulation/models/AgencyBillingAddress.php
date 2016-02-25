<?php

namespace backend\modules\circulation\models;

use Yii;

/**
 * This is the model class for table "agency_billing_address".
 *
 * @property integer $id
 * @property integer $agency_id
 * @property string $full_name
 * @property string $h_no
 * @property string $street_address
 * @property string $p_office
 * @property integer $district_id
 * @property integer $state_id
 * @property integer $pincode
 * @property integer $country_id
 */
class AgencyBillingAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agency_billing_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'agency_id', 'full_name', 'h_no', 'street_address', 'p_office', 'district_id', 'state_id', 'pincode', 'country_id'], 'required'],
            [['id', 'agency_id', 'district_id', 'state_id', 'pincode', 'country_id'], 'integer'],
            [['street_address'], 'string'],
            [['full_name'], 'string', 'max' => 255],
            [['h_no'], 'string', 'max' => 50],
            [['p_office'], 'string', 'max' => 250]
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
            'full_name' => 'Full Name',
            'h_no' => 'House No\Name',
            'street_address' => 'Street Address',
            'p_office' => 'Post Office',
            'district_id' => 'District ',
            'state_id' => 'State ',
            'pincode' => 'Pincode',
            'country_id' => 'Country ',
        ];
    }
}
