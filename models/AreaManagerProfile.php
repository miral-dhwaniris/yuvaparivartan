<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area_manager_profile".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $age
 */
class AreaManagerProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'area_manager_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['name', 'address', 'age'], 'required'],
            [['address'], 'string'],
            [['name', 'age','timestamp','upload_status','address'], 'safe']
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
            'address' => 'Address',
            'age' => 'Age',
            'timestamp' => 'timestamp',
            'upload_status' => 'upload_status'
        ];
    }
}
