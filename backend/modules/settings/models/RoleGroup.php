<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "_role_group".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 *
 * @property RoleModuleRights[] $roleModuleRights
 */
class RoleGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '_role_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 250],
            [['name'], 'unique']
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
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoleModuleRights()
    {
        return $this->hasMany(RoleModuleRights::className(), ['role_id' => 'id']);
    }
}
