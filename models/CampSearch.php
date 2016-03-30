<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Camp;

/**
 * CampSearch represents the model behind the search form about `app\models\Camp`.
 */
class CampSearch extends Camp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'state', 'district', 'block', 'village', 'camp_code', 'camp_start_date', 'tentative_end_date', 'actual_end_date', 'camp_status', 'no_of_enrollment', 'camp_facilitator', 'camp_facilitator_date', 'camp_leader', 'camp_leader_date', 'camp_leader_induction_provided', 'number_of_forms_filled', 'certificate_requisition', 'amount_of_voucher', 'voucher_images', 'amount_of_fees_collected', 'name_of_person_holding_the_amount', 'name_of_person_holding_the_amount_phone_number', 'amount_of_fees_deposited', 'venue_details', 'rent_for_camp', 'infrastructure_images'], 'safe'],
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
        $query = Camp::find();

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
            'camp_facilitator_date' => $this->camp_facilitator_date,
            'camp_leader_date' => $this->camp_leader_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'block', $this->block])
            ->andFilterWhere(['like', 'village', $this->village])
            ->andFilterWhere(['like', 'camp_code', $this->camp_code])
            ->andFilterWhere(['like', 'camp_start_date', $this->camp_start_date])
            ->andFilterWhere(['like', 'tentative_end_date', $this->tentative_end_date])
            ->andFilterWhere(['like', 'actual_end_date', $this->actual_end_date])
            ->andFilterWhere(['like', 'camp_status', $this->camp_status])
            ->andFilterWhere(['like', 'no_of_enrollment', $this->no_of_enrollment])
            ->andFilterWhere(['like', 'camp_facilitator', $this->camp_facilitator])
            ->andFilterWhere(['like', 'camp_leader', $this->camp_leader])
            ->andFilterWhere(['like', 'camp_leader_induction_provided', $this->camp_leader_induction_provided])
            ->andFilterWhere(['like', 'number_of_forms_filled', $this->number_of_forms_filled])
            ->andFilterWhere(['like', 'certificate_requisition', $this->certificate_requisition])
            ->andFilterWhere(['like', 'amount_of_voucher', $this->amount_of_voucher])
            ->andFilterWhere(['like', 'voucher_images', $this->voucher_images])
            ->andFilterWhere(['like', 'amount_of_fees_collected', $this->amount_of_fees_collected])
            ->andFilterWhere(['like', 'name_of_person_holding_the_amount', $this->name_of_person_holding_the_amount])
            ->andFilterWhere(['like', 'name_of_person_holding_the_amount_phone_number', $this->name_of_person_holding_the_amount_phone_number])
            ->andFilterWhere(['like', 'amount_of_fees_deposited', $this->amount_of_fees_deposited])
            ->andFilterWhere(['like', 'venue_details', $this->venue_details])
            ->andFilterWhere(['like', 'rent_for_camp', $this->rent_for_camp])
            ->andFilterWhere(['like', 'infrastructure_images', $this->infrastructure_images]);

        return $dataProvider;
    }
}
