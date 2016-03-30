<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Camp */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Camps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="camp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'state',
            'district',
            'block',
            'village',
            'camp_code',
            'camp_start_date',
            'tentative_end_date',
            'actual_end_date',
            'camp_status',
            'no_of_enrollment',
            'camp_facilitator',
            'camp_facilitator_date',
            'camp_leader',
            'camp_leader_date',
            'camp_leader_induction_provided',
            'number_of_forms_filled',
            'certificate_requisition',
            'amount_of_voucher',
            'voucher_images:ntext',
            'amount_of_fees_collected',
            'name_of_person_holding_the_amount',
            'name_of_person_holding_the_amount_phone_number',
            'amount_of_fees_deposited',
            'venue_details',
            'rent_for_camp',
            'infrastructure_images:ntext',
        ],
    ]) ?>

</div>
