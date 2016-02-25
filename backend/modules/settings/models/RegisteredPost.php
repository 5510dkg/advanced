<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "_registered_post".
 *
 * @property integer $id
 * @property string $top_tempelate
 * @property string $wt
 * @property string $postage
 * @property string $tagline
 * @property string $sn_tag
 * @property string $pjy_name
 * @property string $org_name
 */
class RegisteredPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '_registered_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['top_tempelate', 'wt', 'postage', 'tagline', 'sn_tag', 'pjy_name', 'org_name'], 'required'],
            [['top_tempelate', 'tagline'], 'string'],
            [['wt', 'postage'], 'string', 'max' => 30],
            [['sn_tag', 'pjy_name', 'org_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'top_tempelate' => 'Top Tempelate',
            'wt' => 'Wt',
            'postage' => 'Postage',
            'tagline' => 'Tagline',
            'sn_tag' => 'Sn Tag',
            'pjy_name' => 'Pjy Name',
            'org_name' => 'Org Name',
        ];
    }
}
