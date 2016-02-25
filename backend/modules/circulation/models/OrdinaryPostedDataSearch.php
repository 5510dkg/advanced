<?php

namespace backend\modules\circulation\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\circulation\models\OrdinaryPostedData;

/**
 * OrdinaryPostedDataSearch represents the model behind the search form about `backend\modules\circulation\models\OrdinaryPostedData`.
 */
class OrdinaryPostedDataSearch extends OrdinaryPostedData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'agency_id', 'tempelate_id', 'pjy', 'org', 'ord_id'], 'integer'],
            [['wt', 'postage', 'address_bar', 'sn', 'date'], 'safe'],
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
        $query = OrdinaryPostedData::find();

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
            'tempelate_id' => $this->tempelate_id,
            'pjy' => $this->pjy,
            'org' => $this->org,
            'date' => $this->date,
            'ord_id' => $this->ord_id,
        ]);

        $query->andFilterWhere(['like', 'wt', $this->wt])
            ->andFilterWhere(['like', 'postage', $this->postage])
            ->andFilterWhere(['like', 'address_bar', $this->address_bar])
            ->andFilterWhere(['like', 'sn', $this->sn]);

        return $dataProvider;
    }
}
