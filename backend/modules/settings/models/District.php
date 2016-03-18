<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "_district".
 *
 * @property integer $id
 * @property string $name
 * @property integer $state_id
 *
 * @property State $state
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '_district';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'state_id'], 'required'],
            [['state_id'], 'integer'],
            [['name'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'state_id' => 'State ID',
        ];
    }
    public function getName($id) {
         $query = (new \yii\db\Query())->select(['*'])->from('_district')->where(['id' =>$id]);
             $command = $query->createCommand();
             return $data = $command->queryAll();
             
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(State::className(), ['id' => 'state_id']);
    }
}
