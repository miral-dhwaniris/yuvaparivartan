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
    function selected_user_type($mthis)
    {
        var users_user_level = $mthis;

//        alert('s');
        var selectedLevel = users_user_level.options[users_user_level.selectedIndex].value;
//        alert('s');

        $.ajax({
            type: "GET",
            url: 'index.php?r=users/load-dcp-container&type=' + selectedLevel,
//           data: {'district_ids': selectedStatesInString},
//            data: {'centers':'<?php //echo ($model->isNewRecord)? "":($model->centers != "")?$model->centers:"";  ?>','states_selected':selectedStatesInString},
            success: function (data) {
                // process data

                alert(data);
                document.getElementById('dcp_container').innerHTML = data;
//                listbox_selectall('users-partners',true);

            }
        });


    }
</script>
<script>
    function district_changed($mthis)
    {
        alert('df');
        var selectedStates = $mthis.length;

        var selectedStatesInString = "";
        for (x = 0; x < selectedStates; x++)
        {
            if ($mthis[x].selected)
            {
                //alert(InvForm.SelBranch[x].value);
                if (selectedStatesInString == "")
                {
                    selectedStatesInString = $mthis[x].value;
                }
                else
                {
                    selectedStatesInString = selectedStatesInString + "," + $mthis[x].value;
                }

            }
        }
        alert(selectedStatesInString);

        $.ajax({
            type: "GET",
            url: 'index.php?r=users/district-changed-partner-load',
            data: {'district_ids': selectedStatesInString},
//            data: {'centers':'<?php //echo ($model->isNewRecord)? "":($model->centers != "")?$model->centers:"";  ?>','states_selected':selectedStatesInString},
            success: function (data) {
                // process data
//                alert(data);

                alert(data);
                document.getElementById('partners_container').innerHTML = data;

                listbox_selectall('users-partners', true);
//                listbox_selectall('users-partners',true);

            }
        });

        $.ajax({
            type: "GET",
            url: 'index.php?r=users/district-changed-center-load',
            data: {'district_ids': selectedStatesInString},
//            data: {'centers':'<?php //echo ($model->isNewRecord)? "":($model->centers != "")?$model->centers:"";  ?>','states_selected':selectedStatesInString},
            success: function (data) {
                // process data
//                alert(data);

                alert(data);
                document.getElementById('centers_container').innerHTML = data;

                listbox_selectall('users-centers', true);
//                listbox_selectall('users-partners',true);

            }
        });
    }
    function partner_changed($mthis)
    {
        alert('df');
        var selectedStates = $mthis.length;

        var selectedStatesInString = "";
        for (x = 0; x < selectedStates; x++)
        {
            if ($mthis[x].selected)
            {
                //alert(InvForm.SelBranch[x].value);
                if (selectedStatesInString == "")
                {
                    selectedStatesInString = $mthis[x].value;
                }
                else
                {
                    selectedStatesInString = selectedStatesInString + "," + $mthis[x].value;
                }

            }
        }
        alert(selectedStatesInString);


        $.ajax({
            type: "GET",
            url: 'index.php?r=users/partner-changed-center-load',
            data: {'partner_ids': selectedStatesInString},
//            data: {'centers':'<?php //echo ($model->isNewRecord)? "":($model->centers != "")?$model->centers:"";  ?>','states_selected':selectedStatesInString},
            success: function (data) {
                // process data
//                alert(data);

                alert(data);
                document.getElementById('centers_container').innerHTML = data;

                listbox_selectall('users-centers', true);
//                listbox_selectall('users-partners',true);

            }
        });
    }

    function listbox_selectall(listID, isSelect) {
        var listbox = document.getElementById(listID);
        for (var count = 0; count < listbox.options.length; count++) {
            listbox.options[count].selected = isSelect;
        }
    }
</script>
<script>
    function load_partners($mthis)
    {
        var users_user_level = $mthis;
        var selectedLevel = users_user_level.options[users_user_level.selectedIndex].value;
        var selectedStates = $mthis.length;

//        alert(selectedStates);


        var selectedStatesInString = "";
        for (x = 0; x < selectedStates; x++)
        {
            if ($mthis[x].selected)
            {
                //alert(InvForm.SelBranch[x].value);
                if (selectedStatesInString == "")
                {
                    selectedStatesInString = $mthis[x].value;
                }
                else
                {
                    selectedStatesInString = selectedStatesInString + "," + $mthis[x].value;
                }

            }
        }

//         alert(selectedStatesInString);



        $.ajax({
            type: "GET",
            url: 'index.php?r=users/load-partners',
            data: {'district_ids': selectedStatesInString},
//            data: {'centers':'<?php //echo ($model->isNewRecord)? "":($model->centers != "")?$model->centers:"";  ?>','states_selected':selectedStatesInString},
            success: function (data) {
                // process data
//                alert(data);

                document.getElementById('partner_container').innerHTML = data;
//                listbox_selectall('users-partners',true);

            }
        });
    }
</script>

<script>
    function load_centers($mthis)
    {
        var users_user_level = $mthis;
        var selectedLevel = users_user_level.options[users_user_level.selectedIndex].value;
        var selectedStates = $mthis.length;

//        alert(selectedStates);


        var selectedStatesInString = "";
        for (x = 0; x < selectedStates; x++)
        {
            if ($mthis[x].selected)
            {
                //alert(InvForm.SelBranch[x].value);
                if (selectedStatesInString == "")
                {
                    selectedStatesInString = $mthis[x].value;
                }
                else
                {
                    selectedStatesInString = selectedStatesInString + "," + $mthis[x].value;
                }

            }
        }

//         alert(selectedStatesInString);



        $.ajax({
            type: "GET",
            url: 'index.php?r=users/load-partners',
            data: {'district_ids': selectedStatesInString},
//            data: {'centers':'<?php //echo ($model->isNewRecord)? "":($model->centers != "")?$model->centers:"";  ?>','states_selected':selectedStatesInString},
            success: function (data) {
                // process data
//                alert(data);

                document.getElementById('partner_container').innerHTML = data;
//                listbox_selectall('users-partners',true);

            }
        });
    }
</script>
<script>

    function district_load()
    {
        alert('sd');
        $(document).ready(function () {
            alert('df');
            $('#district_container').load('index.php?r=users/get-district');
        });
    }



    function type_selected($mthis)
    {
        var selected_type = document.getElementById('users-user_type');
        var selectedLevel = selected_type.options[selected_type.selectedIndex].value;

        alert(selectedLevel);


    }

    function state_selected($mthis)
    {
        var users_user_level = document.getElementById('users-user_level');

        var selectedLevel = users_user_level.options[users_user_level.selectedIndex].value;
        var selectedStates = $mthis.length;

//        alert(selectedStates);


        var selectedStatesInString = "";
        for (x = 0; x < selectedStates; x++)
        {
            if ($mthis[x].selected)
            {
                //alert(InvForm.SelBranch[x].value);
                if (selectedStatesInString == "")
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
            url: 'index.php?r=user-levels/load-centers-with-states&user_level_id=' + selectedLevel,
//            data: {'centers': '<?php echo ($model->isNewRecord) ? "" : ($model->centers != "") ? $model->centers : ""; ?>','states_selected': selectedStatesInString},
            data: {'centers': '<?php echo ($model->isNewRecord) ? "" : ($model->centers != "") ? $model->centers : ""; ?>', 'states_selected': selectedStatesInString},
            success: function (data) {
                // process data
//                alert(data);

                document.getElementById('center_container').innerHTML = data;

            }
        });

    }

    function check_all_states($mthis)
    {
        var users_states = document.getElementById('users-states');

        var selectedStates = users_states.length;

//        alert(selectedStates);

        for (x = 0; x < selectedStates; x++)
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

        var selectedCenters = users_centers.length;

//        alert(selectedStates);

        for (x = 0; x < selectedCenters; x++)
        {
            users_centers[x].selected = $mthis.checked;
        }


    }
</script>


<div class="users-form"  >

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
    
    
    <?= $form->field($model, 'mobile_number')->textInput(['maxlength' => true]) ?>
    

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

<?= $form->field($model, 'confirm_password')->passwordInput(['maxlength' => true]) ?>




    <div class="row">

        <div class="col-lg-2">
        </div>

        <div class="col-lg-2">
        </div>


        <div class="col-lg-2">
        </div>
    </div>


    <?php
//        echo $form->field($model, 'user_type')
//                    ->dropDownList(
//                            getLevelTypeArray(),          // Flat array ('id'=>'label')
//                        ['prompt'=>'Select Level...','onchange'=>'selected_user_type(this)']    // options
//                    );
    ?>


    

    <?php
    echo $form->field($model, 'user_level')
            ->dropDownList(
                    ArrayHelper::map(UserLevels::find()->all(), 'id', 'level_name'), // Flat array ('id'=>'label')
                    ['prompt' => 'Select Level...', 'onchange' => 'level_selected(this);']    // options
    );
    ?>


    <?php
    echo $form->field($model, 'user_type')
            ->dropDownList(
                    ArrayHelper::map(\app\models\UserType::find()->all(), 'type_name', 'type_name'), // Flat array ('id'=>'label')
                    ['prompt' => 'Select Level...', 'onchange' => 'level_selected(this);']    // options
    );
    ?>
    
    
    <?php
    echo $form->field($model, 'camp_coordinator')
            ->dropDownList(
                    ArrayHelper::map(\app\models\CampCoordinatorProfile::find()->all(), 'id', 'name'), // Flat array ('id'=>'label')
                    ['prompt' => 'Select Camp Coordinator...']    // options
    );
    ?>
        
        
        
    <?php // $form->field($model, 'user_level')->textInput(['maxlength' => true])  ?>

    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
