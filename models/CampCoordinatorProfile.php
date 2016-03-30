<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "camp_coordinator_profile".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $age
 */
class CampCoordinatorProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'camp_coordinator_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['name', 'address', 'age'], 'required'],
            [['address'], 'string'],
            [['name', 'age','timestamp','upload_status','area_manager','address'], 'safe']
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
            'address' => 'Address',
            'age' => 'Age',
            'timestamp' => 'timestamp',
            'upload_status' => 'upload_status'
        ];
    }
}
