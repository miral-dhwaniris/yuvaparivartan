<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CampSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="camp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'state') ?>

    <?= $form->field($model, 'district') ?>

    <?= $form->field($model, 'block') ?>

    <?php // echo $form->field($model, 'village') ?>

    <?php // echo $form->field($model, 'camp_code') ?>

    <?php // echo $form->field($model, 'camp_start_date') ?>

    <?php // echo $form->field($model, 'tentative_end_date') ?>

    <?php // echo $form->field($model, 'actual_end_date') ?>

    <?php // echo $form->field($model, 'camp_status') ?>

    <?php // echo $form->field($model, 'no_of_enrollment') ?>

    <?php // echo $form->field($model, 'camp_facilitator') ?>

    <?php // echo $form->field($model, 'camp_facilitator_date') ?>

    <?php // echo $form->field($model, 'camp_leader') ?>

    <?php // echo $form->field($model, 'camp_leader_date') ?>

    <?php // echo $form->field($model, 'camp_leader_induction_provided') ?>

    <?php // echo $form->field($model, 'number_of_forms_filled') ?>

    <?php // echo $form->field($model, 'certificate_requisition') ?>

    <?php // echo $form->field($model, 'amount_of_voucher') ?>

    <?php // echo $form->field($model, 'voucher_images') ?>

    <?php // echo $form->field($model, 'amount_of_fees_collected') ?>

    <?php // echo $form->field($model, 'name_of_person_holding_the_amount') ?>

    <?php // echo $form->field($model, 'name_of_person_holding_the_amount_phone_number') ?>

    <?php // echo $form->field($model, 'amount_of_fees_deposited') ?>

    <?php // echo $form->field($model, 'venue_details') ?>

    <?php // echo $form->field($model, 'rent_for_camp') ?>

    <?php // echo $form->field($model, 'infrastructure_images') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
