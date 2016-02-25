<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "_department".
 *
 * @property integer $id
 * @property string $name
 * @property string $sub_department
 * @property integer $status
 *
 * @property Modules[] $modules
 * @property SubDepartment[] $subDepartments
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '_department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['sub_department'], 'string'],
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
            'sub_department' => 'Sub Department',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModules()
    {
        return $this->hasMany(Modules::className(), ['department_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubDepartments()
    {
        return $this->hasMany(SubDepartment::className(), ['department_id' => 'id']);
    }
}
