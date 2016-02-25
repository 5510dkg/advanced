<?php

namespace backend\modules\settings\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\settings\models\BundleSize;

/**
 * BundleSizeSearch represents the model behind the search form about `backend\modules\settings\models\BundleSize`.
 */
class BundleSizeSearch extends BundleSize
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'delivery_method', 'size'], 'integer'],
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
        $query = BundleSize::find();

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
            'delivery_method' => $this->delivery_method,
            'size' => $this->size,
        ]);

        return $dataProvider;
    }
}
