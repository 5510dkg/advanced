<?php

namespace backend\modules\settings\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\settings\models\District;

/**
 * DistrictSearch represents the model behind the search form about `backend\modules\settings\models\District`.
 */
class DistrictSearch extends District
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'state_id'], 'integer'],
            [['name'], 'safe'],
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
        $query = District::find();

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
            'state_id' => $this->state_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
