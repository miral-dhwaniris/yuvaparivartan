<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Agenda */
/* @var $form yii\widgets\ActiveForm */
?>

<h3>
    <?php 
    if(isset($_GET['other']['date']))
    {
        echo Html::a('< Go To Agenda List', ['agenda/index','date'=>$_GET['other']['date']], ['class' => 'btn btn-primary']);
    }
    else
    {
        echo Html::a('< Go To Agenda List', ['agenda/index'], ['class' => 'btn btn-primary']);
    }

    ?>

    <?php 

    if($model->isNewRecord == false)
    {
        echo  "<b> | Agenda : </b>".$model->activity;
    }

    ?>
</h3>
<hr>

<div class="agenda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'activity')->dropDownList(
            \yii\helpers\ArrayHelper::map(  
            app\models\Activities::find()->all()
                    ,'key', 'name')
                       ) ?>
    
    <?= $form->field($model, 'camp_coordinator')->dropDownList(
            \yii\helpers\ArrayHelper::map(  
                    app\models\CampCoordinatorProfile::find()->all()
                    ,'id', 'name')
                       ) ?>

    <?= $form->field($model, 'camp')->dropDownList(
            \yii\helpers\ArrayHelper::map(  
                    app\models\Camp::find()->all()
                    ,'id', 'camp_code')
                       ,['prompt'=>'Select']) ?>

    
    
    <?php 
    
    
    ?>
    
    <?= $form->field($model, 'village')->textInput(['maxlength' => true]) ?>
    
    
    
    <?php  
    
    $agenda_dateReaadonly = false;
    if(isset($_GET['other']['date']))
    {
        $model->agenda_date = $_GET['other']['date'];
        $model = changeDateformatWhileGet($model);
        $agenda_dateReaadonly = true;
    }
    $isMdte = ($agenda_dateReaadonly==false)?'m_date ':' ';
    
    ?>
    <?= $form->field($model, 'agenda_date')->textInput(['class'=> $isMdte.'form-control','readonly'=>$agenda_dateReaadonly]) ?>
    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
