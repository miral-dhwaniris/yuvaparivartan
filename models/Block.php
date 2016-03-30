<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "block".
 *
 * @property integer $id
 * @property string $district
 * @property string $block
 * @property string $timestamp
 * @property string $upload_status
 */
class Block extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'block';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['district', 'block', 'timestamp', 'upload_status'], 'required'],
            [['district', 'block', 'timestamp', 'upload_status'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'district' => 'District',
            'block' => 'Block',
            'timestamp' => 'Timestamp',
            'upload_status' => 'Upload Status',
        ];
    }
}
