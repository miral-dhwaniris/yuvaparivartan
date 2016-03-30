<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agenda".
 *
 * @property integer $id
 * @property string $activity
 * @property string $camp_coordinator
 * @property string $camp
 * @property string $village
 */
class Agenda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agenda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['activity', 'camp_coordinator', 'camp', 'village'], 'required'],
            [['created_by_camp_coordinator','status','timestamp','upload_status','agenda_date','activity', 'camp_coordinator', 'camp', 'village'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'activity' => 'Activity',
            'camp_coordinator' => 'Camp Coordinator',
            'camp' => 'Camp',
            'village' => 'Village',
            'agenda_date'=>'Date',
            'timestamp'=>'timestamp',
            'upload_status'=>'upload_status',
            'status'=>'status',
            'created_by_camp_coordinator'=>'Created by camp coordinator'
        ];
    }
}
