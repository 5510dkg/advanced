<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "_designation".
 *
 * @property integer $id
 * @property integer $department_id
 * @property string $designation_name
 *
 * @property Department $department
 */
class Designation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '_designation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department_id', 'designation_name'], 'required'],
            [['department_id'], 'integer'],
            [['designation_name'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'department_id' => 'Department ID',
            'designation_name' => 'Designation Name',
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
