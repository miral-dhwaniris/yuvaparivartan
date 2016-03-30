<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "camp_facilitator".
 *
 * @property integer $id
 * @property string $name
 * @property string $camp
 * @property string $address
 * @property string $course
 * @property string $photo
 * @property string $timestamp
 * @property string $upload_status
 */
class CampFacilitator extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'camp_facilitator';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['name', 'camp', 'address', 'course', 'photo', 'timestamp', 'upload_status'], 'required'],
            [['name', 'camp', 'address', 'course', 'photo', 'timestamp', 'upload_status'], 'safe']
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
            'camp' => 'Camp',
            'address' => 'Address',
            'course' => 'Course',
            'photo' => 'Photo',
            'timestamp' => 'Timestamp',
            'upload_status' => 'Upload Status',
        ];
    }
}
