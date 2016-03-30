<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserLevels */
/* @var $form yii\widgets\ActiveForm */
?>


<!--<script type="text/javascript">
        $(document).ready(function(){
            
            $("select").select2();
//            ,disabled!='disabled'
            
//            $("select[multiple!='multiple']").select2();
        })
    </script>-->
    
<div class="user-levels-form">

    
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'level_name')->textInput(['maxlength' => true]) ?>

    
    
    <?php
    $levelArrayFromDb = '';
    if(isset($model->level_authentications))
    {
        if($model->level_authentications!="")
        {
            $levelArrayFromDb = $model->level_authentications;
        }
    }
    
    ?>
    
    <?php
//        echo $form->field($model, 'level_type')
//                    ->dropDownList(
//                        getLevelTypeArray() ,          // Flat array ('id'=>'label')
//                        ['prompt'=>'Select Level...']    // options
//                    );
    ?>
    
    
    <h3>Access on this level</h3>
    <br/>
    
    
    
    <?php 
    
    $allUserList =  \app\models\Users::find()->all();
    
    $MUSerLIst = array();
    for($i=0;$i<count($allUserList);$i++)
    {
        $singleUser  = $allUserList[$i];
        
        
        $userLevel = \app\models\UserLevels::find()->where(["id"=>$singleUser->user_level])->one();
        if($userLevel!=null)
        {
            $MUSerLIst[$singleUser->id] = $singleUser->first_name. " ". $singleUser->last_name." {User Level : ".$userLevel->level_name."} - {User Type: ".$singleUser->user_type."}";
        }
        
    }    
    
    
    ?>
    
    
    
    
    <?php 
    
    
    $blockEnableDisableList = array();
    $blockEnableDisableList[] = "centers";
    $blockEnableDisableList[] = "courses";
    $blockEnableDisableList[] = "modules";
    $blockEnableDisableList[] = "employer";
    $blockEnableDisableList[] = "employee";
    $blockEnableDisableList[] = "batch";
    $blockEnableDisableList[] = "candidate";
    $blockEnableDisableList[] = "job-details";
    $blockEnableDisableList[] = "contact-person-details";
    
    
    $basicActions = array();
    $basicActions[] = "create";
    $basicActions[] = "update";
    $basicActions[] = "index";
//    $basicActions[] = "delete";
    $basicActions[] = "view";
    
    $moduleList = array();
    
    $moduleList[] = "users";
    $moduleList[] = "user-levels";
    $moduleList[] = "agenda";
    $moduleList[] = "state";
    $moduleList[] = "district";
    $moduleList[] = "block";
    $moduleList[] = "courses";
    
    $moduleList[] = "area-manager-profile";
    $moduleList[] = "camp-coordinator-profile";
    $moduleList[] = "camp-leader-profile";
    $moduleList[] = "camp";
    $moduleList[] = "camp-facilitator";
    $moduleList[] = "activities";
    $moduleList[] = "meet-key-person";
    $moduleList[] = "community-meeting";
    $moduleList[] = "door-to-door-meeting";
    
   
    
    ?>
    
    
    <div class="row">
        
    
        
        
        
    
    <?php 
    
    $pagerAuthenticationModels = null;
    
    $authenticationColumnValues = [];
    $approveToColumnValues = [];
    if(!$model->isNewRecord)
    {
        $pagerAuthenticationModels = app\models\PageAuthentications::find()->where(['level_id'=>$model->id])->all();

        for($k=0;$k<count($pagerAuthenticationModels);$k++)
        {
            $singelePageM = $pagerAuthenticationModels[$k];
            $authenticationColumnValues[] = $singelePageM->authentication; 
            if($singelePageM->approve_to != "" || ($singelePageM->notify_to != "[]" && $singelePageM->notify_to != ""))
            {
                $approveToColumnValues[] = $singelePageM->authentication;
            }
        }

    }
    
    
        
    for($i=0;$i<count($moduleList);$i++)
    {
        echo '<div class="col-lg-2">';
        
        $actions = $basicActions;
        
        
        
        if($moduleList[$i] == 'vfa-data')
        {
           $actions[] = 'graph-of-vfa-data';
           $actions[] = 'total-households-enrolled';
           $actions[] = 'number-member-planning';
           $actions[] = 'number-of-awareness';
           $actions[] = 'number-of-training';
           $actions[] = 'avg-number-member';
           $actions[] = 'avg-number-member';
           $actions[] = 'household-trained';
           $actions[] = 'new-rng-established';
          
           
        }
        
        if($moduleList[$i] == 'household-data')
        {
           $actions[] = 'graph-of-household-data';
           $actions[] = 'graph-cluster-name-wise-household';
           $actions[] = 'table-of-ppi';
           $actions[] = 'graph-of-ppi';
        }
        
        if($moduleList[$i] == 'cluster-data')
        {
        
           
           $actions[] = 'cluster-wise-member-attendance-in-va-meeting';
           $actions[] = 'number-of-rng-established';
           $actions[] = 'hectare-of-land-food-production';
           $actions[] = 'hectare-of-land-non-food-production';
           $actions[] = 'quintals-food-production';
           $actions[] = 'quintals-non-food-production';
           $actions[] = 'number-of-farmers';
           $actions[] = 'number-production-companies';
        }   
        $nameM = ucfirst($moduleList[$i]);
        echo "<h4>{$nameM} Module</h4>";
        echo '<div class="x_panel">';
        
        echo '<br/>';
        
        
        echo "<h4>Pages Authenticated</h4>";
        echo Html::listBox("PageAuthentication[{$i}][authentication]",  $authenticationColumnValues,  
                createUrls($actions, $moduleList[$i])
                ,['class'=>'form-control','multiple'=>true]);
        
        
        
        echo "<h4>Approval Of</h4>";
        echo Html::listBox("PageAuthentication[{$i}][approve_of]",$approveToColumnValues,
                createUrls($actions, $moduleList[$i])
                ,['class'=>'form-control','multiple'=>true]);
        
        
        $releativeActions = [];
        for($mi=0;$mi<count($actions);$mi++)
        {
            $releativeActions[] = $moduleList[$i]."/".$actions[$mi];
        }
        $finalApproveTo = '';
        $finalNotifyTo = array();
        if($pagerAuthenticationModels != null)
        {
            $notifytoGot = false;
            for($k=0;$k<count($pagerAuthenticationModels);$k++)
            {
                $singelePageM = $pagerAuthenticationModels[$k];
                
                
                
                if($singelePageM->approve_to != "")
                {
                    if(in_array($singelePageM->authentication, $releativeActions))
                    {
                        $finalApproveTo = $singelePageM->approve_to;
                    }
                }
                

                if($singelePageM->notify_to != "[]" || $singelePageM->notify_to != "")
                {
                    if(in_array($singelePageM->authentication, $releativeActions))
                    {     
                        if($notifytoGot == false)
                        {
                            $finalNotifyTo = json_decode($singelePageM->notify_to,false);
                            $notifytoGot = true;
                        }
                    }
                }
                
            }
        }
        
//        echo "<h4>Approval To</h4>";yii\helpers\ArrayHelper::map(\app\models\Users::find()->all(), 'id', 'user_name')
        echo Html::dropDownList("PageAuthentication[{$i}][approve_to]",$finalApproveTo,  $MUSerLIst,['prompt'=>'Select.','class'=>'form-control']);
        
        
        
        echo "<h4>Notify To</h4>";
        echo Html::listBox("PageAuthentication[{$i}][notify_to]",$finalNotifyTo,  $MUSerLIst,['multiple'=>true,'class'=>'form-control']);
        
        
        echo '</div>';
        
        echo '</div>';
    }
    
    ?>
    
    
    </div>
    
    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
