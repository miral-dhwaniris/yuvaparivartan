<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dependants".
 *
 * @property integer $id
 * @property string $centre_list
 */
class Dependants extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dependants';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['foraign_idm'], 'required'],
            [['center_list','partner_list','state_list','district_list','users_id'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'centre_list' => 'Centre List',
            'partner_ngo_list' => 'Partner NGO List',
        ];
    }
}
