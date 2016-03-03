<?php

namespace backend\modules\circulation\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\circulation\models\AgencyReceipt;

/**
 * AgencyReceiptSearch represents the model behind the search form about `backend\modules\circulation\models\AgencyReceipt`.
 */
class AgencyReceiptSearch extends AgencyReceipt
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'agency_id', 'payment_mode'], 'integer'],
            [['rcpt_date', 'comment', 'created_on', 'created_on_time'], 'safe'],
            [['cr_amt'], 'number'],
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
        $query = AgencyReceipt::find();

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
            'rcpt_date' => $this->rcpt_date,
            'cr_amt' => $this->cr_amt,
            'payment_mode' => $this->payment_mode,
            'created_on' => $this->created_on,
            'created_on_time' => $this->created_on_time,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
