<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "state".
 *
 * @property integer $id
 * @property string $state
 * @property string $timestamp
 * @property string $upload_status
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'state';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['state', 'timestamp', 'upload_status'], 'required'],
            [['state', 'timestamp', 'upload_status'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'state' => 'State',
            'timestamp' => 'Timestamp',
            'upload_status' => 'Upload Status',
        ];
    }
}
