<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CommunityMeeting;

/**
 * CampSearchCommunityMeeting represents the model behind the search form about `app\models\CommunityMeeting`.
 */
class CampSearchCommunityMeeting extends CommunityMeeting
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state', 'district', 'block', 'village', 'camp_coordinator', 'meeting_date', 'number_of_people_in_meeting', 'timestamp', 'upload_status'], 'safe'],
            [['id'], 'integer'],
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
        $query = CommunityMeeting::find();

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
            'meeting_date' => $this->meeting_date,
        ]);

        $query->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'block', $this->block])
            ->andFilterWhere(['like', 'village', $this->village])
            ->andFilterWhere(['like', 'camp_coordinator', $this->camp_coordinator])
            ->andFilterWhere(['like', 'number_of_people_in_meeting', $this->number_of_people_in_meeting])
            ->andFilterWhere(['like', 'timestamp', $this->timestamp])
            ->andFilterWhere(['like', 'upload_status', $this->upload_status]);

        return $dataProvider;
    }
}
