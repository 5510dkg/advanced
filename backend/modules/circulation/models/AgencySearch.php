<?php

namespace backend\modules\circulation\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\circulation\models\Agency;

/**
 * AgencySearch represents the model behind the search form about `backend\modules\circulation\models\Agency`.
 */
class AgencySearch extends Agency
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'route_id', 'vehicle_id', 'email', 'landline_no', 'mobile_no', 'address_status', 'mail_country_id', 'mail_state_id', 'mail_district_id', 'mail_pincode', 'panchjanya', 'organiser', 'add_country_id', 'add_state_id', 'add_district_id', 'add_pincode'], 'integer'],
            [['name', 'account_id', 'reference', 'status', 'mail_house_no', 'mail_street_address', 'mail_p_office', 'add_house_no', 'add_street_address', 'add_p_office'], 'safe'],
            [['security_amt'], 'number'],
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
        $query = Agency::find();

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
            'route_id' => $this->route_id,
            'vehicle_id' => $this->vehicle_id,
            'email' => $this->email,
            'landline_no' => $this->landline_no,
            'mobile_no' => $this->mobile_no,
            'security_amt' => $this->security_amt,
            'address_status' => $this->address_status,
            'mail_country_id' => $this->mail_country_id,
            'mail_state_id' => $this->mail_state_id,
            'mail_district_id' => $this->mail_district_id,
            'mail_pincode' => $this->mail_pincode,
            'panchjanya' => $this->panchjanya,
            'organiser' => $this->organiser,
            'add_country_id' => $this->add_country_id,
            'add_state_id' => $this->add_state_id,
            'add_district_id' => $this->add_district_id,
            'add_pincode' => $this->add_pincode,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'account_id', $this->account_id])
            ->andFilterWhere(['like', 'reference', $this->reference])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'mail_house_no', $this->mail_house_no])
            ->andFilterWhere(['like', 'mail_street_address', $this->mail_street_address])
            ->andFilterWhere(['like', 'mail_p_office', $this->mail_p_office])
            ->andFilterWhere(['like', 'add_house_no', $this->add_house_no])
            ->andFilterWhere(['like', 'add_street_address', $this->add_street_address])
            ->andFilterWhere(['like', 'add_p_office', $this->add_p_office]);

        return $dataProvider;
    }
}
