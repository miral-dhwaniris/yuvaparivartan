<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MeetKeyPerson */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meet-key-person-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'block')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'village')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'camp_coordinator')->dropDownList(
            \yii\helpers\ArrayHelper::map( 
                    app\models\CampCoordinatorProfile::find()->all()
                    , "id", "name")); ?>
    
    
    <?= $form->field($model, 'meeting_date')->textInput() ?>

    <?= $form->field($model, 'name_of_person')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
