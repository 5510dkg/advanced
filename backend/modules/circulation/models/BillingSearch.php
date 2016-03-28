<?php

namespace backend\modules\circulation\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\circulation\models\Billing;

/**
 * BillingSearch represents the model behind the search form about `backend\modules\circulation\models\Billing`.
 */
class BillingSearch extends Billing
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'no_of_issue'], 'integer'],
            [['month'], 'safe'],
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
        $query = Billing::find();

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
            'month' => $this->month,
            'no_of_issue' => $this->no_of_issue,
        ]);

        return $dataProvider;
    }
}
