<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "_sub_department".
 *
 * @property integer $id
 * @property string $name
 * @property integer $department_id
 *
 * @property Department $department
 */
class SubDepartment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '_sub_department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'department_id'], 'required'],
            [['department_id'], 'integer'],
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
            'department_id' => 'Department ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }
}
