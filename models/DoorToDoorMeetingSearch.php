<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DoorToDoorMeeting;

/**
 * DoorToDoorMeetingSearch represents the model behind the search form about `app\models\DoorToDoorMeeting`.
 */
class DoorToDoorMeetingSearch extends DoorToDoorMeeting
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['id', 'village', 'camp_coordinator', 'meeting_date'], 'integer'],
            [['id', 'village', 'camp_coordinator', 'meeting_date','state', 'district', 'block', 'number_of_households_visited', 'number_of_target_groups_met', 'timestamp', 'upload_status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DoorToDoorMeeting::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'village' => $this->village,
            'camp_coordinator' => $this->camp_coordinator,
            'meeting_date' => $this->meeting_date,
        ]);

        $query->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'block', $this->block])
            ->andFilterWhere(['like', 'number_of_households_visited', $this->number_of_households_visited])
            ->andFilterWhere(['like', 'number_of_target_groups_met', $this->number_of_target_groups_met])
            ->andFilterWhere(['like', 'timestamp', $this->timestamp])
            ->andFilterWhere(['like', 'upload_status', $this->upload_status]);

        return $dataProvider;
    }
}
