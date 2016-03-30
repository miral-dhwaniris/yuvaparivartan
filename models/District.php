<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property integer $id
 * @property string $state
 * @property string $district
 * @property string $timestamp
 * @property string $upload_status
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['state', 'district', 'timestamp', 'upload_status'], 'required'],
            [['state', 'district', 'timestamp', 'upload_status'], 'safe']
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
            'district' => 'District',
            'timestamp' => 'Timestamp',
            'upload_status' => 'Upload Status',
        ];
    }
}
