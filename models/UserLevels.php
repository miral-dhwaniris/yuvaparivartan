<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_levels".
 *
 * @property integer $id
 * @property string $level_name
 * @property string $level_authentications
 */
class UserLevels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_levels';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_name'], 'required'],
            [['level_name', 'level_authentications', 'level_type'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'level_name' => 'Level Name',
            'level_authentications' => 'Level Authentications',
        ];
    }
}
