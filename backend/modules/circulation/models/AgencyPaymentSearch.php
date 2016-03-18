<?php

namespace backend\modules\circulation\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\circulation\models\AgencyPayment;

/**
 * AgencyPaymentSearch represents the model behind the search form about `backend\modules\circulation\models\AgencyPayment`.
 */
class AgencyPaymentSearch extends AgencyPayment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'agency_id', 'payment_mode'], 'integer'],
            [['bill_number', 'month', 'payment_detail', 'comment'], 'safe'],
            [['amount', 'balance'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AgencyPayment::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'agency_id' => $this->agency_id,
            'amount' => $this->amount,
            'month' => $this->month,
            'balance' => $this->balance,
            'payment_mode' => $this->payment_mode,
        ]);

        $query->andFilterWhere(['like', 'bill_number', $this->bill_number])
            ->andFilterWhere(['like', 'payment_detail', $this->payment_detail])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
