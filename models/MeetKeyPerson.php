<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meet_key_person".
 *
 * @property integer $id
 * @property string $state
 * @property string $district
 * @property string $block
 * @property string $meeting_date
 * @property string $name_of_person
 * @property string $role
 * @property string $phone_number
 * @property string $photo
 * @property string $timestamp
 * @property string $upload_status
 */
class MeetKeyPerson extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meet_key_person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['state', 'district', 'block', 'meeting_date', 'name_of_person', 'role', 'phone_number', 'photo', 'timestamp', 'upload_status'], 'required'],
//            [['meeting_date'], 'safe'],
            [['meeting_date','village','camp_coordinator','state', 'district', 'block', 'name_of_person', 'role', 'phone_number', 'photo', 'timestamp', 'upload_status'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'camp_coordinator'=>'Camp Coordinator',
            'state' => 'State',
            'district' => 'District',
            'block' => 'Block',
            'village'=>'Village',
            'meeting_date' => 'Meeting Date',
            'name_of_person' => 'Name Of Person',
            'role' => 'Role',
            'phone_number' => 'Phone Number',
            'photo' => 'Photo',
            'timestamp' => 'Timestamp',
            'upload_status' => 'Upload Status',
        ];
    }
}
