<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\UserLevels;
use app\models\Center;
use app\models\States;
/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<script>
    function level_selected($mthis)
    {
        
        var selectedValue =  $mthis.options[$mthis.selectedIndex].value;
        
        
        
         
        $.ajax({
            type: "POST",
            url: 'index.php?r=user-levels/load-states&user_level_id='+selectedValue,
            data: {'states': '<?php echo ($model->isNewRecord)? "":($model->states != "")?$model->states:""; ?>'},
            success: function(data) {
                // process data
//                alert(data);
                
                document.getElementById('state_container').innerHTML = data;
                
            }
         });
         
         
        
        $.ajax({
            type: "POST",
            url: 'index.php?r=user-levels/load-centers&user_level_id='+selectedValue,
            data: {'centers': '<?php echo ($model->isNewRecord)? "":($model->centers != "")?$model->centers:""; ?>'},
            success: function(data) {
                // process data
//                alert(data);
                
                document.getElementById('center_container').innerHTML = data;
                
            }
         });
         
        
         
    }
    
    
    function state_selected($mthis)
    {
        var users_user_level = document.getElementById('users-user_level');
        
        var selectedLevel =  users_user_level.options[users_user_level.selectedIndex].value;
        var selectedStates =  $mthis.length;
        
//        alert(selectedStates);
        
        
        var selectedStatesInString = "";
        for (x=0;x<selectedStates;x++)
         {
            if ($mthis[x].selected)
            {
             //alert(InvForm.SelBranch[x].value);
             if(selectedStatesInString == "")
             {
                 selectedStatesInString = $mthis[x].value;
             }
             else
             {
                 selectedStatesInString = selectedStatesInString + "," + $mthis[x].value;
             }
             
            }
         }
        
        
        
        $.ajax({
            type: "POST",
            url: 'index.php?r=user-levels/load-centers-with-states&user_level_id='+selectedLevel,
//            data: {'centers': '<?php echo ($model->isNewRecord)? "":($model->centers != "")?$model->centers:""; ?>','states_selected': selectedStatesInString},
            data: {'centers':'<?php echo ($model->isNewRecord)? "":($model->centers != "")?$model->centers:""; ?>','states_selected':selectedStatesInString},
            success: function(data) {
                // process data
//                alert(data);
                
                document.getElementById('center_container').innerHTML = data;
                
            }
         });
         
    }
    
    function check_all_states($mthis)
    {
        var users_states = document.getElementById('users-states');
        
        var selectedStates =  users_states.length;
        
//        alert(selectedStates);
        
        for (x=0;x<selectedStates;x++)
         {
            users_states[x].selected = $mthis.checked;
         }
         
//         if($mthis.checked == true)
//         {
//            state_selected(users_states);
//         }

        state_selected(users_states);
         
    }
    
    function check_all_centers($mthis)
    {
        var users_centers = document.getElementById('users-centers');
        
        var selectedCenters =  users_centers.length;
        
//        alert(selectedStates);
        
        for (x=0;x<selectedCenters;x++)
         {
            users_centers[x].selected = $mthis.checked;
         }
         
         
    }
</script>


<div class="users-form"  >

    <?php $form = ActiveForm::begin(); ?>

    <?php 
    
    $userLevelInfo = UserLevels::find()->where(['id'=>$model->user_level])->one();
    
    ?>
    
    <h1>User Levele: <b><?php echo $userLevelInfo->level_name; ?></b></h1>
    <h3>User Name: <b><?php echo $model->user_name; ?></b></h3>
    
    <div class="row">
        <div class="col-lg-4" style="border-radius: 10px; box-shadow: 0px 0px 20px #888888;">
           <h2>Authentications</h2>
            <table style="width: 400px;"> 

                <?php

                    $levelAuthenticationArray = explode(",", $userLevelInfo->level_authentications);


                    for($i=0;$i<count($levelAuthenticationArray);$i++)
                    {
                        $action = explode("/", $levelAuthenticationArray[$i]);

                ?>
                <tr>
                    <td style="font-size: 20px;color: green" >✔</td>

                    <td style="font-size: 15px;">
                        <?php  echo ucfirst($action[0]). " ". ucfirst($action[1]); ?>
                    </td>

                </tr>
                <?php


                    }

                ?>

            </table>
        </div>
        <div class="col-lg-4">
            
            
             <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'confirm_password')->textInput(['maxlength' => true]) ?>
            
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

        </div>
    </div>
    
    

    
    
    <?php // $form->field($model, 'user_level')->textInput(['maxlength' => true]) ?>

    
    <?php ActiveForm::end(); ?>

</div>
