<?php

namespace backend\modules\circulation\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\circulation\models\AgencyCreditNote;

/**
 * AgencyCreditNoteSearch represents the model behind the search form about `backend\modules\circulation\models\AgencyCreditNote`.
 */
class AgencyCreditNoteSearch extends AgencyCreditNote
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'agency_id', 'return_date', 'issue_type', 'pjy', 'org', 'issue_date', 'return_type'], 'integer'],
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
        $query = AgencyCreditNote::find();

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
            'return_date' => $this->return_date,
            'issue_type' => $this->issue_type,
            'pjy' => $this->pjy,
            'org' => $this->org,
            'issue_date' => $this->issue_date,
            'return_type' => $this->return_type,
        ]);

        return $dataProvider;
    }
}
