<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CampSearchCommunityMeeting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="community-meeting-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'state') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'district') ?>

    <?= $form->field($model, 'block') ?>

    <?= $form->field($model, 'village') ?>

    <?php // echo $form->field($model, 'camp_coordinator') ?>

    <?php // echo $form->field($model, 'meeting_date') ?>

    <?php // echo $form->field($model, 'number_of_people_in_meeting') ?>

    <?php // echo $form->field($model, 'timestamp') ?>

    <?php // echo $form->field($model, 'upload_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
