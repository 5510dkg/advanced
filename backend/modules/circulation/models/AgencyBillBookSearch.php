<?php

namespace backend\modules\circulation\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\circulation\models\AgencyBillBook;

/**
 * AgencyBillBookSearch represents the model behind the search form about `backend\modules\circulation\models\AgencyBillBook`.
 */
class AgencyBillBookSearch extends AgencyBillBook
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'agency_id', 'pjy', 'org', 'pay_method'], 'integer'],
            [['issue_date', 'total_copies', 'price_per_piece', 'total_price', 'credited_date', 'issue_type', 'created_on'], 'safe'],
            [['discount', 'discounted_amt', 'final_total', 'credit_amt', 'previous_security_amt', 'received_security_amt', 'final_security_amt'], 'number'],
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
        $query = AgencyBillBook::find();

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
            'issue_date' => $this->issue_date,
            'pjy' => $this->pjy,
            'org' => $this->org,
            'discount' => $this->discount,
            'discounted_amt' => $this->discounted_amt,
            'final_total' => $this->final_total,
            'credit_amt' => $this->credit_amt,
            'credited_date' => $this->credited_date,
            'pay_method' => $this->pay_method,
            'previous_security_amt' => $this->previous_security_amt,
            'received_security_amt' => $this->received_security_amt,
            'final_security_amt' => $this->final_security_amt,
            'created_on' => $this->created_on,
        ]);

        $query->andFilterWhere(['like', 'total_copies', $this->total_copies])
            ->andFilterWhere(['like', 'price_per_piece', $this->price_per_piece])
            ->andFilterWhere(['like', 'total_price', $this->total_price])
            ->andFilterWhere(['like', 'issue_type', $this->issue_type]);

        return $dataProvider;
    }
}
