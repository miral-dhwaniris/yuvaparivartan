<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CampLeaderProfile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="camp-leader-profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    
    <?= $form->field($model, 'area_manager')->dropDownList(
            \yii\helpers\ArrayHelper::map(  
            \app\models\AreaManagerProfile::find()->all()  
                    , 'id', 'name'));
                       ?>
    
    <?= $form->field($model, 'camp_coordinator')->dropDownList(
            \yii\helpers\ArrayHelper::map(  
                    \app\models\CampCoordinatorProfile::find()->all()  
                    , 'id', 'name'));
                       ?>
    
    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
