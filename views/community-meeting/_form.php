<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CommunityMeeting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="community-meeting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'block')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'village')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'camp_coordinator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meeting_date')->textInput() ?>

    <?= $form->field($model, 'number_of_people_in_meeting')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
