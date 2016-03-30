<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $user_name
 * @property string $password
 * @property string $confirm_password
 * @property string $user_level
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = array();
        
        if(isTesting()==false)
        {
            $rules = [
//                        ['confirm_password', 'compare', 'compareAttribute' => 'password'],
//                        [['first_name', 'last_name', 'user_name', 'password', 'confirm_password', 'user_level','email'], 'required'],
//                        [['email'], 'email'],
//
//                        [['mobile_number'], 'string','length'=>10],
//                        [['mobile_number'], 'integer'],
                     ];
        }
        
        
        $safe = array();
        $safe = [
            [['camp_coordinator','mobile_number','email','first_name', 'last_name', 'user_name', 'password', 'confirm_password', 'user_level','states','centers','user_type','districts'], 'safe'],
        ];
        
        return array_merge($rules,$safe);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'user_name' => 'User Name',
            'password' => 'Password',
            'confirm_password' => 'Confirm Password',
            'user_level' => 'User Level',
            'centers' => 'Centers',
            'states' => 'States',
            'camp_coordinator'=>'Camp Coordinator'
        ];
    }
}
