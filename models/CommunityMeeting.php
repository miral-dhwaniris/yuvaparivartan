<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "community_meeting".
 *
 * @property string $state
 * @property integer $id
 * @property string $district
 * @property string $block
 * @property string $village
 * @property string $camp_coordinator
 * @property string $meeting_date
 * @property string $number_of_people_in_meeting
 * @property string $timestamp
 * @property string $upload_status
 */
class CommunityMeeting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'community_meeting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state', 'district', 'block', 'village', 'camp_coordinator', 'number_of_people_in_meeting', 'timestamp', 'upload_status'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'state' => 'State',
            'id' => 'ID',
            'district' => 'District',
            'block' => 'Block',
            'village' => 'Village',
            'camp_coordinator' => 'Camp Coordinator',
            'meeting_date' => 'Meeting Date',
            'number_of_people_in_meeting' => 'Number Of People In Meeting',
            'timestamp' => 'Timestamp',
            'upload_status' => 'Upload Status',
        ];
    }
}
