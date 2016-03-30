<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "camp_leader_profile".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $age
 */
class CampLeaderProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'camp_leader_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['name', 'address', 'age'], 'required'],
//            [['address'], 'string'],
            [['name', 'age','timestamp','upload_status','area_manager','camp_coordinator','address'], 'safe']
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
            'area_manager'=>'Area Manager',
            'camp_coordinator'=>'Camp Coordinator',
            'address' => 'Address',
            'age' => 'Age',
            'timestamp' => 'timestamp',
            'upload_status' => 'upload_status'
        ];
    }
}
