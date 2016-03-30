<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CampSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Camps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="camp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Camp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'camp_code',
            'state',
            'district',
            'block',
            // 'village',
            // 'camp_code',
            // 'camp_start_date',
            // 'tentative_end_date',
            // 'actual_end_date',
            // 'camp_status',
            // 'no_of_enrollment',
            // 'camp_facilitator',
            // 'camp_facilitator_date',
            // 'camp_leader',
            // 'camp_leader_date',
            // 'camp_leader_induction_provided',
            // 'number_of_forms_filled',
            // 'certificate_requisition',
            // 'amount_of_voucher',
            // 'voucher_images:ntext',
            // 'amount_of_fees_collected',
            // 'name_of_person_holding_the_amount',
            // 'name_of_person_holding_the_amount_phone_number',
            // 'amount_of_fees_deposited',
            // 'venue_details',
            // 'rent_for_camp',
            // 'infrastructure_images:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
