<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MeetKeyPerson;

/**
 * MeetKeyPersonSearch represents the model behind the search form about `app\models\MeetKeyPerson`.
 */
class MeetKeyPersonSearch extends MeetKeyPerson
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['state', 'district', 'block', 'meeting_date', 'name_of_person', 'role', 'phone_number', 'photo', 'timestamp', 'upload_status'], 'safe'],
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
        $query = MeetKeyPerson::find();

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
            ->andFilterWhere(['like', 'name_of_person', $this->name_of_person])
            ->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'timestamp', $this->timestamp])
            ->andFilterWhere(['like', 'upload_status', $this->upload_status]);

        return $dataProvider;
    }
}
