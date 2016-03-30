<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Camp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="camp-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?php 
    
//        display_array($model);
    
    ?>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->dropDownList(yii\helpers\ArrayHelper::map(
                app\models\State::find()->all()
                    ,  'id', 'state')) ?>
    
    <?= $form->field($model, 'district')->dropDownList(yii\helpers\ArrayHelper::map(
                 app\models\District::find()->all()
                    ,  'id', 'district')) ?>
    
    <?= $form->field($model, 'block')->dropDownList(yii\helpers\ArrayHelper::map(
                 app\models\Block::find()->all()
                    ,  'id', 'block')) ?>   

    <?= $form->field($model, 'village')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'camp_code')->textInput() ?>

    <?= $form->field($model, 'camp_start_date')->textInput(['class'=>'m_date form-control']) ?>

    <?= $form->field($model, 'actual_end_date')->textInput(['class'=>'m_date form-control']) ?>

    <?= $form->field($model, 'tentative_end_date')->textInput(['class'=>'m_date form-control']) ?>

    <?= $form->field($model, 'camp_status')->dropDownList(arrayToDoubleArray(['Select.',"Started","Ongoing","Completed"])) ?>

    <?= $form->field($model, 'no_of_enrollment')->textInput(['maxlength' => true]) ?>

    
    <?= $form->field($model, 'camp_coordinator')->dropDownList(yii\helpers\ArrayHelper::map(  
                 app\models\CampCoordinatorProfile::find()->all()  
            ,  'id', 'name')) ?>
    
    <?= $form->field($model, 'camp_facilitator')->dropDownList(yii\helpers\ArrayHelper::map(  
            app\models\CampFacilitator::find()->all()  
            ,  'id', 'name')) ?>

    <?= $form->field($model, 'camp_facilitator_date')->textInput(['class'=>'m_date form-control']) ?>

    <?= $form->field($model, 'camp_leader')->dropDownList(yii\helpers\ArrayHelper::map(  
                 app\models\CampLeaderProfile::find()->all()  
            ,  'id', 'name')) ?>
    
    <?= $form->field($model, 'camp_leader_date')->textInput(['class'=>'m_date form-control']) ?>

    <?= $form->field($model, 'camp_leader_induction_provided')->textInput(arrayToDoubleArray(['Select.',"Yes","No"])) ?>

    <?= $form->field($model, 'number_of_forms_filled')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'certificate_requisition')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount_of_voucher')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'voucher_images')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'amount_of_fees_collected')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_of_person_holding_the_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_of_person_holding_the_amount_phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount_of_fees_deposited')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'venue_details')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rent_for_camp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'infrastructure_images')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
