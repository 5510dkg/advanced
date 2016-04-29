<?php

namespace backend\modules\circulation\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\circulation\models\Agency;

class Agencyadd extends Agency
{
    public function rules()
    {
        // only fields in rules() are searchable
        return [
            [[ 'name', 'account_id', 'mail_pincode','mail_p_office','mail_state_id'], 'string','max' => 110],
            
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Agency::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
           // echo 'hii';exit;
            return $dataProvider;
        }
        
       // echo $this->mail_p_office;exit;
//        $this->mail_state_id;
//                print_r($params);exit;
       // echo 'hii';exit;
        // adjust the query by adding the filters
        
         $query->andFilterWhere(['like', 'name', $this->name]);
                $query->andFilterWhere(['like', 'account_id', $this->account_id]);
                $query->andFilterWhere(['like', 'mail_pincode', $this->mail_pincode]);
                $query->andFilterWhere(['mail_state_id'=>$this->mail_state_id]);
                $query->andFilterWhere(['mail_p_office'=>$this->mail_p_office]);
                 // $query->andFilterWhere(['status'=>$this->status]);

        return $dataProvider;
    }
}