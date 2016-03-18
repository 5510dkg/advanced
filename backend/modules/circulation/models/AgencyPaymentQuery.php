<?php

namespace backend\modules\circulation\models;

/**
 * This is the ActiveQuery class for [[AgencyPayment]].
 *
 * @see AgencyPayment
 */
class AgencyPaymentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return AgencyPayment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AgencyPayment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}