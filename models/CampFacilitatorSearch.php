<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CampFacilitator;

/**
 * CampFacilitatorSearch represents the model behind the search form about `app\models\CampFacilitator`.
 */
class CampFacilitatorSearch extends CampFacilitator
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'camp', 'address', 'course', 'photo', 'timestamp', 'upload_status'], 'safe'],
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
        $query = CampFacilitator::find();

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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'camp', $this->camp])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'course', $this->course])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'timestamp', $this->timestamp])
            ->andFilterWhere(['like', 'upload_status', $this->upload_status]);

        return $dataProvider;
    }
}
