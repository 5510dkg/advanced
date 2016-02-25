<?php

namespace backend\modules\admin\models;
use backend\modules\settings\models\Department;
use backend\modules\settings\models\RoleGroup;
use backend\modules\settings\models\Designation;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $name
 * @property string $mobile
 * @property string $extension_no
 * @property integer $department_id
 * @property integer $designation_id
 * @property integer $role_group_id
 * @property string $deleted_at
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'email', 'name','department_id','role_group_id','department_id','designation_id','mobile'], 'required'],
            [['department_id','designation_id', 'role_group_id', 'status'], 'integer'],
            [['deleted_at','extension_no', 'created_at', 'updated_at'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'name'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'name' => 'Name',
            'mobile' => 'Contact No',
            'extension_no' => 'Extension No.',
            'department_id' => 'Department ID',
            'designation_id' => 'Designation ',
            'role_group_id' => 'Role Group ID',
            'deleted_at' => 'Deleted At',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }
    public function getDesignation()
    {
        return $this->hasOne(Designation::className(), ['id' => 'designation_id']);
    }
    public function getroleGroup()
    {
        return $this->hasOne(RoleGroup::className(), ['id' => 'role_group_id']);
    }
}
