<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "door_to_door_meeting".
 *
 * @property integer $id
 * @property string $state
 * @property string $district
 * @property string $block
 * @property integer $village
 * @property integer $camp_coordinator
 * @property integer $meeting_date
 * @property string $number_of_households_visited
 * @property string $number_of_target_groups_met
 * @property string $timestamp
 * @property string $upload_status
 */
class DoorToDoorMeeting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'door_to_door_meeting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['state', 'district', 'block', 'village', 'camp_coordinator', 'meeting_date', 'number_of_households_visited', 'number_of_target_groups_met', 'timestamp', 'upload_status'], 'required'],
//            [['village', 'camp_coordinator', 'meeting_date'], 'integer'],
            [['state', 'district', 'block','village', 'camp_coordinator', 'meeting_date', 'number_of_households_visited', 'number_of_target_groups_met', 'timestamp', 'upload_status'], 'safe']
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
            'block' => 'Block',
            'village' => 'Village',
            'camp_coordinator' => 'Camp Coordinator',
            'meeting_date' => 'Meeting Date',
            'number_of_households_visited' => 'Number Of Households Visited',
            'number_of_target_groups_met' => 'Number Of Target Groups Met',
            'timestamp' => 'Timestamp',
            'upload_status' => 'Upload Status',
        ];
    }
}
