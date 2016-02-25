<?php

namespace backend\modules\settings\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\settings\models\RegisteredPost;

/**
 * RegisteredPostSearch represents the model behind the search form about `backend\modules\settings\models\RegisteredPost`.
 */
class RegisteredPostSearch extends RegisteredPost
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['top_tempelate', 'wt', 'postage', 'tagline', 'sn_tag', 'pjy_name', 'org_name'], 'safe'],
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
        $query = RegisteredPost::find();

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
        ]);

        $query->andFilterWhere(['like', 'top_tempelate', $this->top_tempelate])
            ->andFilterWhere(['like', 'wt', $this->wt])
            ->andFilterWhere(['like', 'postage', $this->postage])
            ->andFilterWhere(['like', 'tagline', $this->tagline])
            ->andFilterWhere(['like', 'sn_tag', $this->sn_tag])
            ->andFilterWhere(['like', 'pjy_name', $this->pjy_name])
            ->andFilterWhere(['like', 'org_name', $this->org_name]);

        return $dataProvider;
    }
}
