<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activities".
 *
 * @property integer $id
 * @property string $name
 * @property string $key
 * @property string $timestamp
 * @property string $upload_status
 */
class Activities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['nam', 'key', 'timestamp', 'upload_status'], 'required'],
            [['name', 'key', 'timestamp', 'upload_status'], 'safe']
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
            'key' => 'Key',
            'timestamp' => 'Timestamp',
            'upload_status' => 'Upload Status',
        ];
    }
}
