<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;


AppAsset::register($this);
?>




<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->

    <link href="Template/gentelella-master/production/css/bootstrap.min.css" rel="stylesheet">

    <link href="Template/gentelella-master/production/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="Template/gentelella-master/production/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="Template/gentelella-master/production/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Template/gentelella-master/production/css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="Template/gentelella-master/production/css/icheck/flat/green.css" rel="stylesheet" />
    <link href="Template/gentelella-master/production/css/floatexamples.css" rel="stylesheet" type="text/css" />
    
    

    <!--<script src="Template/gentelella-master/production/css/bootstrap-latest/js/bootstrap.min.js"></script>-->
    <script src="Template/gentelella-master/production/js/jquery.min.js"></script>
    <script src="Template/gentelella-master/production/js/nprogress.js"></script>
    <script src="Template/gentelella-master/production/js/input_mask/jquery.inputmask.js"></script>
    
    <script src="DatePickerM1/js/bootstrap-datepicker.js"></script>
    
    
    <!--<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>-->
    
    
    <script>
        NProgress.start();
    </script>
    
    
    <link href="mcss/bootstrap-switch.css" rel="stylesheet">
    <script src="mjs/bootstrap-switch.js"></script>
    
    <link href="mcss/jquery.timepicker.css" rel="stylesheet" type="text/css" />
    <script src="mjs/jquery.timepicker.min.js"></script>
    
    
    <link href="mcss/select2.css" rel="stylesheet" />
    <script src="mjs/select2.js"></script>
    <script src="mjs/typeahead.jquery.js"></script>
    <script src="mjs/type_ahead_m.js"></script>
    
    <link href="mcss/typeaheadjs.css" rel="stylesheet" />
    <link href="mcss/typeaheadjs_1.css" rel="stylesheet" />
    
    <script type="text/javascript">
        $(document).ready(function(){
            
            $("select[multiple!='multiple']").select2();
//            ,disabled!='disabled'
            
//            $("select[multiple!='multiple']").select2();
        })
    </script>
    
    
    
    <script>
        (function($) {
            $(function() {
                $('.mtimepicker').timepicker(
                        {
                            interval: 10
                        });
                        
                        
            });
        })(jQuery);
    </script>


    
    <script type="text/javascript">
        // When the document is ready
        $(document).ready(function () {
            $(".m_date").attr("placeholder", "DD-MM-YYYY");
            if($(".m_date").val() == "0000-00-00")
            {
               $(".m_date").val(""); 
            }
            
            $('.m_date').datepicker({
                format: "dd-mm-yyyy",
                orientation: "top",
            }); 
        });
    </script>
    
    <script src="MyScripts/commonJs.js"></script>
    
    <link rel="stylesheet" href="DatePickerM1/css/bootstrap-datepicker.css">
    
    <script src="mjs/moment.js"></script>
    
    
    
    <script>
    function field_changed($mthis,$field,$container)
    {
        var selectedValue =  $mthis.value;
//        alert($field);
        var onchange = $("[name='"+$field+"']").attr('onchange');
//        alert(onchange);
                
         $.ajax({
            type: "GET",
            url: 'index.php?r=candidate/field-changed',
            data: {'value': selectedValue,'field': $field,'container': $container,'onchange':onchange},
//            data: {'centers':'<?php //echo ($model->isNewRecord)? "":($model->centers != "")?$model->centers:""; ?>','states_selected':selectedStatesInString},
            success: function(data) {
                // process data
//                alert(data);
                
//                alert(data);
                document.getElementById($container).innerHTML = data;
            }
         });
    }
    function field_changed_multiselect($mthis,$field,$container)
    {
        
        var selectedLength =  $mthis.length;
        
        
        var selectedInString = "";
        
        
        
        for (x=0;x<selectedLength;x++)
         {
            if ($mthis[x].selected)
            {
             //alert(InvForm.SelBranch[x].value);
             if(selectedInString == "")
             {
                 selectedInString = $mthis[x].value;
             }
             else
             {
                 selectedInString = selectedInString + "," + $mthis[x].value;
             }
             
            }
         }
        
//        alert(selectedInString);
        
        
        
        
//        alert($field);
        var onchange = $("[name='"+$field+"']").attr('onchange');
//        alert(onchange);
        
        
        
         $.ajax({
            type: "GET",
            url: 'index.php?r=candidate/field-changed',
            data: {'value': selectedInString,'field': $field,'container': $container,'onchange':onchange},
//            data: {'centers':'<?php //echo ($model->isNewRecord)? "":($model->centers != "")?$model->centers:""; ?>','states_selected':selectedStatesInString},
            success: function(data) {
                // process data
//                alert(data);
                
//                alert(data);
                document.getElementById($container).innerHTML = data;
                
                
            }
         });
    }
    </script>
    
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>














<script>
    function ask_confirm(id,controller)
    {
        
        $.ajax({
            type: "GET",
            
            url: 'index.php?r=site/get-alert&id='+id+'&controller='+controller+<?php echo isset($_GET['center_id'])?"'&center_id=".$_GET['center_id']."'" : "''" ?>,
            success: function(data) {
                
                $('#alert_container').html(data);
                $('#myModal').modal('show');
            }
         });
    }
    function ask_confirm_to_block_enable(id,controller)
    {
        
        $.ajax({
            type: "GET",
            
            url: 'index.php?r=site/get-alert-to-block-enable&id='+id+'&controller='+controller+<?php echo isset($_GET['center_id'])?"'&center_id=".$_GET['center_id']."'" : "''" ?>,
            success: function(data) {
                
                $('#alert_container').html(data);
                $('#myModal').modal('show');
            }
         });
    }
    function ask_confirm_to_block_disable(id,controller)
    {
        
        $.ajax({
            type: "GET",
            
            url: 'index.php?r=site/get-alert-to-block-disable&id='+id+'&controller='+controller+<?php echo isset($_GET['center_id'])?"'&center_id=".$_GET['center_id']."'" : "''" ?>,
            success: function(data) {
                
                $('#alert_container').html(data);
                $('#myModal').modal('show');
            }
         });
    }
</script>
<!-- Modal -->




<div id="alert_container"></div>
    





<?php



        $main_index = 0;
        $sub_index = 0;
    
        $mainMenuC = array();
        
        $mainMenuC['options']['class'] = 'navbar-nav navbar-right';
        
            
//        display_array($_SESSION);
//        exit;
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        if(isset($_SESSION['login_info']))
        {
            

//            $mainMenuC['items'][$main_index]['label'] = 'Dashboard';
//            $mainMenuC['items'][$main_index]['url'][0] = 'site/index';
            
            
            
            
            
            /*
             * Users TAB
             */
            $submenuAvailable = false;
            $main_index++;
            $sub_index = -1;
            
            $page = 'users/create';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Users';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'users/index';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Edit Users';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'user-type/index';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'User Type';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            if($submenuAvailable == true)
            {
                $mainMenuC['items'][$main_index]['label'] = 'Manage Users';
                $mainMenuC['items'][$main_index]['icon'] = 'users';
            }
            else
            {
                unset($mainMenuC['items'][$main_index]);
                $main_index--;
            }
            
            
            
            
            
            /*
             * User Levles TAB
             */
            $submenuAvailable = false;
            $main_index++;
            $sub_index = -1;
            
            $page = 'user-levels/create';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'User Levels';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'user-levels/index';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Edit User Levels';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            if($submenuAvailable == true)
            {
                $mainMenuC['items'][$main_index]['label'] = 'Manage User Levels';
                $mainMenuC['items'][$main_index]['icon'] = 'at';
            }
            else
            {
                unset($mainMenuC['items'][$main_index]);
                $main_index--;
            }
            
            
            
            
            
            
            /*
             * Manage
             */
            $submenuAvailable = false;
            $main_index++;
            $sub_index = -1;
            
            $page = 'agenda/index';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Agendas';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'state/index';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'State';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'district/index';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'District';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'block/index';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Block';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'courses/index';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Courses';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'area-manager-profile/index';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Area Manager Profile';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'camp-coordinator-profile/index';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Camp Coordinator Profile';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'camp-leader-profile/index';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Camp Leader Profile';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'camp/index';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Camp';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'activities/index';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Activities';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'camp-facilitator/index';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Camp Facilitator';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'meet-key-person/index';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Meet Key Person';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'community-meeting/index';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Community Meeting';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'door-to-door-meeting/index';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Door to door Meeting';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            if($submenuAvailable == true)
            {
                $mainMenuC['items'][$main_index]['label'] = 'Manage';
                $mainMenuC['items'][$main_index]['icon'] = 'flag-o';
            }
            else
            {
                unset($mainMenuC['items'][$main_index]);
                $main_index--;
            }
            
            
            
            
            
            
            
            
            
            
            
            /*
             * Approvals And Notification
             */
            $submenuAvailable = false;
            $main_index++;
            $sub_index = -1;
            
            
            $page = 'approval/approvals';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Approvals';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'notifications/notifications';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Notifications';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            if($submenuAvailable == true)
            {
                $mainMenuC['items'][$main_index]['label'] = 'Approvals & Notifications';
                $mainMenuC['items'][$main_index]['icon'] = 'check';
            }
            else
            {
                unset($mainMenuC['items'][$main_index]);
                $main_index--;
            }
            
            
            
            
            /*
             * CENTERS TAB
             */
//            $submenuAvailable = false;
//            $main_index++;
//            $sub_index = -1;
//            
//            $page = 'centers/create';
//            if(checkAuthenticationPage($page))
//            {
//                $sub_index++;
//                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Center';
//                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
//                $submenuAvailable = true;
//            }
//            $page = 'centers/index';
//            if(checkAuthenticationPage($page))
//            {
//                $sub_index++;
//                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Edit Center';
//                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
//                $submenuAvailable = true;
//            }
//            if($submenuAvailable == true)
//            {
//                $mainMenuC['items'][$main_index]['label'] = 'Manage Centers';
//                $mainMenuC['items'][$main_index]['icon'] = 'flag-o';
//            }
//            else
//            {
//                unset($mainMenuC['items'][$main_index]);
//                $main_index--;
//            }
            
            
            
            
            /*
             * CANDIDATE TAB
             */
//            $submenuAvailable = false;
//            $main_index++;
//            $sub_index = -1;
//            
//            $page = 'candidate/create';
//            if(checkAuthenticationPage($page))
//            {
//                $sub_index++;
//                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Candidate';
//                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
//                $submenuAvailable = true;
//            }
//            $page = 'candidate/index';
//            if(checkAuthenticationPage($page))
//            {
//                $sub_index++;
//                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Edit Candidate';
//                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
//                $submenuAvailable = true;
//            }
//            if($submenuAvailable == true)
//            {
//                $mainMenuC['items'][$main_index]['label'] = 'Manage Candidate';
//                $mainMenuC['items'][$main_index]['icon'] = 'child';
//            }
//            else
//            {
//                unset($mainMenuC['items'][$main_index]);
//                $main_index--;
//            }
            
            
            
            /*
             * REPORTS TAB
             */
            $submenuAvailable = false;
            $main_index++;
            $sub_index = -1;
            
            $page = 'centers/center-wise-report';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Center wise report';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'district/district-wise-report';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'District wise report';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'district/export-all';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'All India';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            if($submenuAvailable == true)
            {
                $mainMenuC['items'][$main_index]['label'] = 'Reports';
                $mainMenuC['items'][$main_index]['icon'] = 'calculator';
            }
            else
            {
                unset($mainMenuC['items'][$main_index]);
                $main_index--;
            }
            
            
            
            
            
            
            
            /*
             * GRAPHS
             */
            $submenuAvailable = false;
            $main_index++;
            $sub_index = -1;
            
            $page = 'candidate/graph-gender-distribution';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Candidate Gender Distribution';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'employer/sector-wise-placement-companies';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Sector Wise Placement Companies';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'centers/graph-smart-center-distribution';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Graph Smart Centre Distribution';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'centers/graph-center-wise-candidate-comparison';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Graph Center Wise Candidate Comparison';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'candidate/graph-joined-student-distribution';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Joined Student Distribution';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            $page = 'candidate/graph-placed-student-distribution';
            if(checkAuthenticationPage($page))
            {
                $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Placed Student Distribution';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            }
            if($submenuAvailable == true)
            {
                $mainMenuC['items'][$main_index]['label'] = 'Graphs';
                $mainMenuC['items'][$main_index]['icon'] = 'pie-chart';
            }
            else
            {
                unset($mainMenuC['items'][$main_index]);
                $main_index--;
            }
            
            
            
        }
        else
        {
            /*
             * Users TAB
             */
            $submenuAvailable = false;
            $main_index++;
            $sub_index = -1;
            
            $page = 'users/login';
            $sub_index++;
                $mainMenuC['items'][$main_index]['items'][$sub_index]['label'] = 'Users';
                $mainMenuC['items'][$main_index]['items'][$sub_index]['url'][0] = $page;
                $submenuAvailable = true;
            
            if($submenuAvailable == true)
            {
                $mainMenuC['items'][$main_index]['label'] = 'Account';
                $mainMenuC['items'][$main_index]['icon'] = 'users';
            }
            else
            {
                unset($mainMenuC['items'][$main_index]);
                $main_index--;
            }
            
            
//            $this->redirect(["users/login"]);
        }
        
//         display_array($mainMenuC);exit; 
        
        
//        $main_index++;
//        $sub_index = 0;
//        if(isset($_SESSION['login_info']))
//        {
////            $mainMenuC['items'][$main_index]['label'] = 'Logout';
////            $mainMenuC['items'][$main_index]['url'][0] = 'users/logout';
//        }
//        else
//        {
//            $mainMenuC['items'][$main_index]['label'] = 'Login';
//            $mainMenuC['items'][$main_index]['url'][0] = 'users/login';
//        }
//        
//        $main_index++;
//        $sub_index = 0;
//        if(isset($_SESSION['login_info']))
//        {
//            $mainMenuC['items'][$main_index]['label'] = ' | '.$_SESSION['login_info']->first_name;
//            $mainMenuC['items'][$main_index]['url'][0] = 'users/profile';
//            $mainMenuC['items'][$main_index]['url']['id'] = $_SESSION['login_info']->id;
//        }
        


?>
<body class="nav-md">

    <div class="container body">


        <div class="main_container" style="background: #D92026">

            <div class="col-md-3 left_col" >
                <div class="left_col scroll-view" >

<!--                    <div class="navbar nav_title" style="border: 0;background: #D92026;">
                        
                        <a href="index.php" class="site_title"><img src="../images/logo.png" width="100%" style="margin-top: 0px;"> </a>
                        <a href="index.php" class="site_title"style="font-size: 15px"> <span>Tech Mahindra Foundation</span></a>
                    </div>-->
                    <a href="index.php" class=""><img src="../images/logo.png" width="100%" style="margin-top: 0px;"> </a>
                        
                    <div class="clearfix"></div>

                    <?php
                    
                                if(isset($_SESSION['login_info']))
                                {
                    ?>
                    <!-- menu prile quick info -->
<!--                    <div class="profile">
                        <div class="profile_pic">
                            <img src="../images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info" >
                            <span>Welcome </span>
                            <h2>
                                
                                <?php
                                
//                                    echo unserialize(serialize($_SESSION['login_info']))->first_name;
//                                    $mainMenuC['items'][$main_index]['label'] = ' | '.$_SESSION['login_info']->first_name;
//                                    $mainMenuC['items'][$main_index]['url'][0] = 'users/profile';
//                                    $mainMenuC['items'][$main_index]['url']['id'] = $_SESSION['login_info']->id;
                                
                                
                                ?>
                                
                            </h2>
                        </div>
                    </div>-->
                    <!-- /menu prile quick info -->
                    <?php 
                                }
                                else
                                {
//                                    echo '-';
                                }
                    ?>

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <!--<h3>General</h3>-->
                            <ul class="nav side-menu">
                                <li class="active"><a href="index.php"><i class="fa fa-bars"></i>Dashboard</a></li>
                                
                                <?php
                                
//                                                                display_array($mainMenuC);
//                                                                exit;
                                
                                
                                
                                if(isset($mainMenuC['items']))
                                {
                                    foreach ($mainMenuC['items'] as $key => $value) {
                                        echo '<li><a><i class="fa fa-'.$mainMenuC['items'][$key]['icon'].'"></i>'.$mainMenuC['items'][$key]['label'].'<span class="fa fa-chevron-down"></span></a>';
                                        echo '<ul class="nav child_menu" style="display: none">';

                                        for($si=0;$si<count($mainMenuC['items'][$key]['items']);$si++)
                                        {
                                            echo '<li><a href="'.Url::toRoute($mainMenuC['items'][$key]['items'][$si]['url'][0]).'">'.$mainMenuC['items'][$key]['items'][$si]['label'].'</a></li>';
                                        }
                                        echo '</ul>';
                                        echo '</li>';
                                    }
                                }
                                
                                ?>
                                
                            </ul>
                        </div>
                        

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
<!--                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>-->
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu" style="background: #FFCB06">
                    <nav class="" role="navigation">
                        <div class="nav toggle " style=" float: left;margin-top: -15px;">
                            <a id="menu_toggle" style="float: left; color: #FFFFFF"><i class="fa fa-bars"></i> </a>
                        </div>
                        <div style=" margin-top: 10px;float: left;font-size: 25px; color: #FFFFFF" >Yuva Parivartan</div>
                        <!--<img src="../images/logo.png" width="120px" style="margin-top: 10px;">-->
<!--                        <div class="nav toggle " style="margin-top: -15px;">
                            <a id="menu_toggle" style="float: left;"><i class="fa fa-bars"></i></a>
                        </div>
                        <div style=" float: left;font-size: 30px; color: #FFFFFF" >Tech Mahindra Foundation</div>-->
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="../images/img.jpg" alt="">
                                    <?php
                                    if(isset($_SESSION['login_info']))
                                    {
                                        
                                        $userLevelName = \app\models\UserLevels::find()->where(['id'=>unserialize(serialize($_SESSION['login_info']))->user_level])->one();
                                        
                                        $showUserNamee = unserialize(serialize($_SESSION['login_info']))->first_name
                                            ." ".unserialize(serialize($_SESSION['login_info']))->last_name
                                            ."/".unserialize(serialize($_SESSION['login_info']))->user_name;
                                        
                                        if($userLevelName!=null)
                                        {
                                            $showUserNamee = $showUserNamee. " - "." ".$userLevelName->level_name ;
                                        }
                                        
//                                        $showUserNamee = $showUserNamee. " - "." ".unserialize(serialize($_SESSION['login_info']))->user_type ;
                                        
                                        echo $showUserNamee;
                                        
    //                                    $mainMenuC['items'][$main_index]['label'] = ' | '.$_SESSION['login_info']->first_name;
    //                                    $mainMenuC['items'][$main_index]['url'][0] = 'users/profile';
    //                                    $mainMenuC['items'][$main_index]['url']['id'] = $_SESSION['login_info']->id;
                                    }
                                    ?>
                                    
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
<!--                                    <li><a href="<?php 
                                    
                                    if(isset($_SESSION['login_info']))
                                    {
                                        echo Url::to(['users/profile','id'=>unserialize(serialize($_SESSION['login_info']))->id]); 
                                    }
                                    
                                    ?>">  Profile</a>
                                    </li>-->
                                    <li>
                                        <a href="javascript:;">Help</a>
                                    </li>
                                    <li><a href="<?php echo Url::to(['users/logout']) ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

<!--                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong><a href="inbox.html">See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>-->

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->


            <!-- page content -->
            <div class="right_col" role="main">

                <?= $content ?>

                <!-- footer content -->

<!--                <footer style="background: #000000">
                    <div >
                        <p class="pull-right">Powered By<a> Dhwani RIS</a>. |
                            <span class="lead"> <img src="../images/dhwanilogo.png" alt="..." width="30px"> Dhwani RIS</span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>-->
                <!-- /footer content -->
            </div>
            <!-- /page content -->

        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="Template/gentelella-master/production/js/bootstrap.min.js"></script>

    <!-- gauge js -->
    <script type="text/javascript" src="Template/gentelella-master/production/js/gauge/gauge.min.js"></script>
    <script type="text/javascript" src="Template/gentelella-master/production/js/gauge/gauge_demo.js"></script>
    <!-- chart js -->
    <script src="Template/gentelella-master/production/js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="Template/gentelella-master/production/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="Template/gentelella-master/production/js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="Template/gentelella-master/production/js/icheck/icheck.min.js"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="Template/gentelella-master/production/js/moment.min.js"></script>
    <script type="text/javascript" src="Template/gentelella-master/production/js/datepicker/daterangepicker.js"></script>

    <script src="Template/gentelella-master/production/js/custom.js"></script>

    <!-- flot js -->
    <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
    <script type="text/javascript" src="Template/gentelella-master/production/js/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="Template/gentelella-master/production/js/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="Template/gentelella-master/production/js/flot/jquery.flot.orderBars.js"></script>
    <script type="text/javascript" src="Template/gentelella-master/production/js/flot/jquery.flot.time.min.js"></script>
    <script type="text/javascript" src="Template/gentelella-master/production/js/flot/date.js"></script>
    <script type="text/javascript" src="Template/gentelella-master/production/js/flot/jquery.flot.spline.js"></script>
    <script type="text/javascript" src="Template/gentelella-master/production/js/flot/jquery.flot.stack.js"></script>
    <script type="text/javascript" src="Template/gentelella-master/production/js/flot/curvedLines.js"></script>
    <script type="text/javascript" src="Template/gentelella-master/production/js/flot/jquery.flot.resize.js"></script>
    <script>
        $(document).ready(function () {
            // [17, 74, 6, 39, 20, 85, 7]
            //[82, 23, 66, 9, 99, 6, 2]
            var data1 = [[gd(2012, 1, 1), 17], [gd(2012, 1, 2), 74], [gd(2012, 1, 3), 6], [gd(2012, 1, 4), 39], [gd(2012, 1, 5), 20], [gd(2012, 1, 6), 85], [gd(2012, 1, 7), 7]];

            var data2 = [[gd(2012, 1, 1), 82], [gd(2012, 1, 2), 23], [gd(2012, 1, 3), 66], [gd(2012, 1, 4), 9], [gd(2012, 1, 5), 119], [gd(2012, 1, 6), 6], [gd(2012, 1, 7), 9]];
            $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
                data1, data2
            ], {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    verticalLines: true,
                    hoverable: true,
                    clickable: true,
                    tickColor: "#d5d5d5",
                    borderWidth: 1,
                    color: '#fff'
                },
                colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
                xaxis: {
                    tickColor: "rgba(51, 51, 51, 0.06)",
                    mode: "time",
                    tickSize: [1, "day"],
                    //tickLength: 10,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Verdana, Arial',
                    axisLabelPadding: 10
                        //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
                },
                yaxis: {
                    ticks: 8,
                    tickColor: "rgba(51, 51, 51, 0.06)",
                },
                tooltip: false
            });

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }
        });
    </script>

    <!-- worldmap -->
    <script type="text/javascript" src="Template/gentelella-master/production/js/maps/jquery-jvectormap-2.0.1.min.js"></script>
    <script type="text/javascript" src="Template/gentelella-master/production/js/maps/gdp-data.js"></script>
    <script type="text/javascript" src="Template/gentelella-master/production/js/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="Template/gentelella-master/production/js/maps/jquery-jvectormap-us-aea-en.js"></script>
    <script>
        $(function () {
            $('#world-map-gdp').vectorMap({
                map: 'world_mill_en',
                backgroundColor: 'transparent',
                zoomOnScroll: false,
                series: {
                    regions: [{
                        values: gdpData,
                        scale: ['#E6F2F0', '#149B7E'],
                        normalizeFunction: 'polynomial'
                    }]
                },
                onRegionTipShow: function (e, el, code) {
                    el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
                }
            });
        });
    </script>
    <!-- skycons -->
    <script src="Template/gentelella-master/production/js/skycons/skycons.js"></script>
    <script>
        var icons = new Skycons({
                "color": "#73879C"
            }),
            list = [
                "clear-day", "clear-night", "partly-cloudy-day",
                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                "fog"
            ],
            i;

        for (i = list.length; i--;)
            icons.set(list[i], list[i]);

        icons.play();
    </script>

    <!-- dashbord linegraph -->
    <script>
        var doughnutData = [
            {
                value: 30,
                color: "#455C73"
            },
            {
                value: 30,
                color: "#9B59B6"
            },
            {
                value: 60,
                color: "#BDC3C7"
            },
            {
                value: 100,
                color: "#26B99A"
            },
            {
                value: 120,
                color: "#3498DB"
            }
    ];
        var myDoughnut = new Chart(document.getElementById("canvas1").getContext("2d")).Doughnut(doughnutData);
    </script>
    <!-- /dashbord linegraph -->
    <!-- datepicker -->
    <script type="text/javascript">
        $(document).ready(function () {

            var cb = function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
            }

            var optionSet1 = {
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                buttonClasses: ['btn btn-default'],
                applyClass: 'btn-small btn-primary',
                cancelClass: 'btn-small',
                format: 'MM/DD/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Clear',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            };
            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#reportrange').daterangepicker(optionSet1, cb);
            $('#reportrange').on('show.daterangepicker', function () {
                console.log("show event fired");
            });
            $('#reportrange').on('hide.daterangepicker', function () {
                console.log("hide event fired");
            });
            $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
                console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
            });
            $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
                console.log("cancel event fired");
            });
            $('#options1').click(function () {
                $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
            });
            $('#options2').click(function () {
                $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
            });
            $('#destroy').click(function () {
                $('#reportrange').data('daterangepicker').remove();
            });
        });
    </script>
    
    
    
    
    
    
    
    <script>
        NProgress.done();
    </script>
    
    <script>
        $(document).ready(function () {
            $(":input").inputmask();
        });
    </script>
    
    <!-- /datepicker -->
    <!-- /footer content -->
</body>

</html>


<?php

if(!isset($_SESSION['login_info']))
{
//    echo Url::toRoute('users/login');
//    return $this->redirect('/user/index',302);
//    header('Location: ' . Url::toRoute('users/login'));
}

?>
