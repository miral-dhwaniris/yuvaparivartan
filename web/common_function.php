<?php

use app\models\UserLevels;
use yii\rest\Controller;


function isTesting()
{
    return false;
}



function setTimestamp($modelName)
{
    if(isset($_POST[$modelName]))
    {
        $milliseconds = round(microtime(true) * 1000);
        $_POST[$modelName]["timestamp"] = $milliseconds;
    }
}

function eventDoneColor()
{
    return "#378006";
}
function eventRemainingColor()
{
    return "#cc0000";
}
//function eventCoordinatorGeneratedAgendaButRemaining()
//{
//    return "#0066ff";
//}
//function eventCoordinatorGeneratedAgendaButCompleted()
//{
//    return "#003d99";
//}
//function eventRefusedByCampCoordinator()
//{
//    return "#cc6699";
//}


function checkCurrentdateIsBetweenTwoDates($start_date,$end_date)
{
    if($start_date!="" && $end_date!="")
    {
        $paymentDate = date('Y-m-d');
        $paymentDate=date('Y-m-d', strtotime($paymentDate));;
        //echo $paymentDate; // echos today! 
        $contractDateBegin = date('Y-m-d', strtotime($start_date));
        $contractDateEnd = date('Y-m-d', strtotime($end_date));

        if (($paymentDate > $contractDateBegin) && ($paymentDate < $contractDateEnd))
        {
          return true;
        }
        else
        {
          return false;
        }
    }
    return false;
}
function checkCurrentdateIsGreaterSomeDate($end_date)
{
    if($end_date!="")
    {
        $paymentDate = date('Y-m-d');
        $paymentDate=date('Y-m-d', strtotime($paymentDate));;
        //echo $paymentDate; // echos today! 
        $contractDateEnd = date('Y-m-d', strtotime($end_date));

        if (($paymentDate > $contractDateEnd))
        {
          return true;
        }
        else
        {
          return false;
        }
    }
    return false;
}

function checkCurrentdateIsBeforeSomeDate($start_date)
{
    if($start_date!="")
    {
        $paymentDate = date('Y-m-d');
        $paymentDate=date('Y-m-d', strtotime($paymentDate));;
        //echo $paymentDate; // echos today! 
        $contractDateBegin = date('Y-m-d', strtotime($start_date));

        if (($paymentDate < $contractDateBegin))
        {
          return true;
        }
        else
        {
          return false;
        }
    }
    return false;
}


function getCurrentDatePositionFromStartAndEnd($start_date,$end_date)
{
    
    if(checkCurrentdateIsBetweenTwoDates($start_date, $end_date)==true)
    {
        return "Ongoing";
    }
    else if(checkCurrentdateIsGreaterSomeDate($end_date)==true)
    {
        return "Completed";
    }
    else if(checkCurrentdateIsBeforeSomeDate($start_date)==true)
    {
        return "Not Started";
    }
}

function fillUserData($model,$column_name)
{
    if(!$model->isNewRecord)
    {
        $pagerAuthenticationModels = app\models\PageAuthentications::find()->where(['level_id'=>$model->id])->all();
        $columnValues = yii\helpers\ArrayHelper::getColumn($pagerAuthenticationModels, $column_name);
        return $columnValues;
    }
    return [];
}


function hideFields($model,$fieldsArray)
{
    ?>

    <script>
        $(document).ready(function()
        {

            <?php

//            $fieldsArray =  $model->nsdcFields();

            for($i=0;$i<count($fieldsArray);$i++)
            {

                ?>
                      $(".field-<?php echo getCurrentControllerNameForFieldContainer() ?>-<?php echo $fieldsArray[$i] ?>").hide();  
                <?php 
            }

            ?>



    //        alert("Sdsds");
    //        var fields_containers =  $("div[class*='form-group field']");
    //        
    //        $("div[class*='form-group field']").filter(function(index)
    //        {
    //            alert($(this).);
    //        })

        })
    </script>
    <?php
}


function createUrls($actions,$module)
{
    $actionssm = array();
    
    for($i=0;$i<count($actions);$i++)
    {
        $actionssm[$module."/".$actions[$i]] = ucfirst($actions[$i]);
    }
    
    return $actionssm;
    
}

function loadModelIfApproving($model)
{
    if(isset($_POST['from_approvals']) && $_POST['from_approvals'] == "approvals")
    {
       $model ->load(json_decode($_POST['model_string'],true));
    }
}


function getUndertrainingpeeriod()
{
    return "10";
}
 


function getNotifyTo()
{
    $action = Yii::$app->urlManager->parseRequest(Yii::$app->request);
        
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    
    if(isset($_SESSION['login_info']))
    {
        $loginModel = unserialize(serialize($_SESSION['login_info']));

        $pageAuthentications = app\models\PageAuthentications::find()
                ->where(['level_id'=>$loginModel->user_level,'authentication'=>$action[0]])
                ->one();
        if($pageAuthentications != null)
        {
            return $pageAuthentications->notify_to;
        }

    }
    
    return '';
}

function getApproveTo()
{
    
    
    $action = Yii::$app->urlManager->parseRequest(Yii::$app->request);
        
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    
    if(isset($_SESSION['login_info']))
    {
        $loginModel = unserialize(serialize($_SESSION['login_info']));

        $pageAuthentications = app\models\PageAuthentications::find()
                ->where(['level_id'=>$loginModel->user_level,'authentication'=>$action[0]])
                ->one();
        if($pageAuthentications != null)
        {
            return $pageAuthentications->approve_to;
        }

    }
    
    return '';
}


function isUnderTrainning($model)
{
    if(isset($model->graduation_status) && $model->graduation_status!="")
    {
        $returnwhat =  true;
    }
}

function NSDCReadOnly($model,$fieldName,$enrollmentField = false,$trainingComplitionField = false)
{
    if(isNSDCorAdmin()==true)
    {
        $returnwhat = false;
        return false;
    }
    else if(in_array($fieldName, $model->nsdcFields()) && !isNSDC())
    {
        $returnwhat =  true;
    }
    else
    {
        $returnwhat = false;
    }
    
    
    if($enrollmentField == true)
    {
        if($model->graduation_status != "")
        {
            $returnwhat = true;
        }
    }
    
    if($trainingComplitionField == true)
    {
        if($model->graduation_status == "Graduate")
        {
            $returnwhat = true;
        }
    }
    
    
    
    
//    if(in_array($fieldName, $model->nsdcFields()) && isNSDCorAdmin())
//    {
//        $returnwhat = false;
//    }
//    else if(in_array($fieldName, $model->nsdcFields()) && !isNSDCorAdmin())
//    {
//        $returnwhat =  true;
//    }
//    else if(!in_array($fieldName, $model->nsdcFields()) && isNSDCorAdmin())
//    {
//        $returnwhat =  true;
//    }
//    else if(!in_array($fieldName, $model->nsdcFields()) && !isNSDCorAdmin())
//    {
//        $returnwhat =  false;
//    }
    
    
    return $returnwhat;
}


function isNSDCorAdmin()
{
    
    
    $action = Yii::$app->urlManager->parseRequest(Yii::$app->request);
        
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    
    if(isset($_SESSION['login_info']))
    {
        $loginModel = unserialize(serialize($_SESSION['login_info']));

        
        if($loginModel->user_type == "NSDC" || $loginModel->user_type == "Admin")
        {
            return true;
        }
        

    }
    
    return false;
}

function isNSDC()
{
    
    
    $action = Yii::$app->urlManager->parseRequest(Yii::$app->request);
        
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    
    if(isset($_SESSION['login_info']))
    {
        $loginModel = unserialize(serialize($_SESSION['login_info']));

        
        if($loginModel->user_type == "NSDC")
        {
            return true;
        }

    }
    
    return false;
}

function checkUserHaveToNotifySomeOne()
{
    
    
    $action = Yii::$app->urlManager->parseRequest(Yii::$app->request);
        
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    
    if(isset($_SESSION['login_info']))
    {
        $loginModel = unserialize(serialize($_SESSION['login_info']));

        $pageAuthentications = app\models\PageAuthentications::find()
                ->where(['level_id'=>$loginModel->user_level,'authentication'=>$action[0]])
                ->andWhere(['<>','notify_to',''])
                ->one();
        if($pageAuthentications != null)
        {
            return true;
        }

    }
    
    return false;
}

function checkUserHaveToApproveSomeOne()
{
    
    
    $action = Yii::$app->urlManager->parseRequest(Yii::$app->request);
        
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    
    if(isset($_SESSION['login_info']))
    {
        $loginModel = unserialize(serialize($_SESSION['login_info']));

        $pageAuthentications = app\models\PageAuthentications::find()
                ->where(['level_id'=>$loginModel->user_level,'authentication'=>$action[0]])
                ->andWhere(['<>','approve_to',''])
                ->one();
        if($pageAuthentications != null)
        {
            return true;
        }

    }
    
    return false;
}

function modelSave($model)
{
    
    if($model->validate() == false)
    {
        return false;
    }
    if(checkUserHaveToApproveSomeOne()==true)
    {   
        
        
        
        $approvalModel = new app\models\Approval();
        $approvalModel->message = ucfirst(explode("/", $_GET["r"])[0])." ".ucfirst(explode("/", $_GET["r"])[1]);
        $approvalModel->model_string = json_encode($_POST);
        $approvalModel->action = explode("?", $_SERVER["REQUEST_URI"])[1];
        
        date_default_timezone_set('Asia/Calcutta');
        $approvalModel->datem = date("Y-m-d h:i:s");
        $approvalModel->status = "0";
        $approvalModel->to = getApproveTo();

        if(checkUserHaveToNotifySomeOne() == true)
        {
            $approvalModel->notify_to = getNotifyTo();
        }
        
        $approvalModel->save();
        
        
        
        return true;
    }
    else
    {
        if($model->save())
        {
            if(isset($_POST['approve_id']))
            {
                
                $approveModel = \app\models\Approval::find()->where(['id'=>$_POST['approve_id']])->one();
                
                $approveModel->status = "1";
               
                $approveModel->save();
                
                if($_POST['notify_to'] != "")
                {
                    
                    $notifyArray = json_decode($_POST['notify_to'],FALSE);
                    
                    for($kk=0;$kk<count($notifyArray);$kk++)
                    {
                        
                        $notifyModel = new app\models\Notifications();


                        date_default_timezone_set('Asia/Calcutta');
                        $notifyModel->message = $_POST['message'];
                        $notifyModel->action = explode("%2F", $_POST['action'])[0]."/view&id=".$model->id;
                        $notifyModel->to = $notifyArray[$kk];
                        $notifyModel->datem = date("Y-m-d h:i:s");
                        $notifyModel->save();

                    }
                    
                }
            }
            if(checkUserHaveToNotifySomeOne() == true)
            {
                $action1 = explode("?", $_SERVER["REQUEST_URI"])[1];
                
                
                $notifyArray = json_decode(getNotifyTo(),FALSE);
                    
                for($kk=0;$kk<count($notifyArray);$kk++)
                {

                    $notifyModel = new app\models\Notifications();


                    date_default_timezone_set('Asia/Calcutta');
                    $notifyModel = new app\models\Notifications();
                    $notifyModel->message = ucfirst(explode("/", $_GET["r"])[0])." ".ucfirst(explode("/", $_GET["r"])[1]);
                    $notifyModel->action = explode("%2F", $action1)[0]."/view&id=".$model->id;
                    $notifyModel->to = $notifyArray[$kk];
                    $notifyModel->datem = date("Y-m-d h:i:s");
                    $notifyModel->save();
                    

                }

//                $notifyModel = new app\models\Notifications();
//                $notifyModel->message = ucfirst(explode("/", $_GET["r"])[0])." ".ucfirst(explode("/", $_GET["r"])[1]);
//                $notifyModel->action = explode("%2F", $action1)[0]."/view&id=".$model->id;
//                $notifyModel->to = getNotifyTo();
//                $notifyModel->datem = date("Y-m-d h:i:s");
//                $notifyModel->save();
                
            }
            return true;
        }
        else
        {
            return false;
        }
    }
}

function checkDisability($compareField,$dataProviderDataSingle,$compareFieldAfter)
{
    if($compareField!="")
    {
        if($dataProviderDataSingle->$compareField == "")
        {
            return "type='hidden' value=''";
        }
    }
    if($compareFieldAfter!="")
    {
        if($dataProviderDataSingle->$compareFieldAfter == "1")
        {
            return "type='hidden' value='1'";
//            return "type='hidden'";
        }
    }
    return "";
}


function fillDataTextField($returnArrayCandidate,$dataProviderDataSingleID,$field_name,$dataProviderDataSingle = null)
{
    if(isset($returnArrayCandidate[$dataProviderDataSingleID]['Candidate'][$field_name]))
    {
        return $returnArrayCandidate[$dataProviderDataSingleID]['Candidate'][$field_name];
    }
    else if($dataProviderDataSingle!=null)
    {
        return $dataProviderDataSingle->$field_name;
    }
    
    return "";
}
function fillDataCheckBox($returnArrayCandidate,$dataProviderDataSingleID,$field_name,$dataProviderDataSingle = null)
{
    if(isset($returnArrayCandidate[$dataProviderDataSingleID]['Candidate'][$field_name]))
    {
        if($returnArrayCandidate[$dataProviderDataSingleID]['Candidate'][$field_name] == "1")
        {
            return "checked";
        }
    }
    else if($dataProviderDataSingle!=null)
    {
        if($dataProviderDataSingle->$field_name == "1")
        {
            return "checked";
        }
    }
    
    
    return "";
}



function checkError($returnArrayCandidate,$dataProviderDataSingleID,$field_name)
{
    if(isset($returnArrayCandidate[$dataProviderDataSingleID]['errors'][$field_name]))
    {
        return $returnArrayCandidate[$dataProviderDataSingleID]['errors'][$field_name][0];
    }
    return "";
}


function getPrinatableArray($fieldsToShow,$dataProvider,$dataProviderModified = array())
{
    $dataproviderArray = $dataProvider->models;

    $labels = $dataproviderArray[0]->attributeLabels();

    $printableArray = array();

    $printableArray[0][0] = "S No";
    for($j=0;$j<count($fieldsToShow);$j++)
    {
        $printableArray[0][$j+1] = $labels[$fieldsToShow[$j]];
    }

    for($i=0;$i<count($dataproviderArray);$i++)
    {
        $printableArray[$i+1][0] = $i+1;
        for($j=0;$j<count($fieldsToShow);$j++)
        {
            if(isset($dataProviderModified[$i][$fieldsToShow[$j]]))
            {
                $printableArray[$i+1][$j+1] = $dataProviderModified[$i][$fieldsToShow[$j]];
            }
            else
            {
                $printableArray[$i+1][$j+1] = $dataproviderArray[$i]->$fieldsToShow[$j];   
            }
        }
    }

    return $printableArray;
}

function exportCSV($fieldsToShow,$dataProvider,$dataProviderModified = array())
{
    
//    $fieldsToShow =array();
//    $fieldsToShow[] = "id";
//    $fieldsToShow[] = "state_name";


    $dataproviderArray = $dataProvider->models;

    $labels = $dataproviderArray[0]->attributeLabels();

    $printableArray = array();

    $printableArray[0][0] = "S No";
    for($j=0;$j<count($fieldsToShow);$j++)
    {
        $printableArray[0][$j+1] = $labels[$fieldsToShow[$j]];
    }

    for($i=0;$i<count($dataproviderArray);$i++)
    {
        $printableArray[$i+1][0] = $i+1;
        for($j=0;$j<count($fieldsToShow);$j++)
        {
            if(isset($dataProviderModified[$i][$fieldsToShow[$j]]))
            {
                $printableArray[$i+1][$j+1] = $dataProviderModified[$i][$fieldsToShow[$j]];
            }
            else
            {
                $printableArray[$i+1][$j+1] = $dataproviderArray[$i]->$fieldsToShow[$j];   
            }
        }
    }

    $list = $printableArray;


    $fp = fopen('file.csv', 'w');

    foreach ($list as $fields) {
        fputcsv($fp, $fields);
    }



    $file = 'file.csv';

    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }
}

function changeDateformatWhileSave($model)
{
    if(isset($_POST[getCurrentControllerNameFromId()]))
    {
        
        $dbColumns = $model->getTableSchema()->columns;
        
        foreach ($dbColumns as $key => $value) 
        {
            if($value->type == "date")
            {
                if(isset($_POST[getCurrentControllerNameFromId()][$key]))
                {
                    if($_POST[getCurrentControllerNameFromId()][$key] != "")
                    {
//                        display_array($_POST[getCurrentControllerNameFromId()][$key]);
//                        exit;
                        $_POST[getCurrentControllerNameFromId()][$key] = changeDateFormat($_POST[getCurrentControllerNameFromId()][$key]);
                    }
                }
            }
        }
    }
}



function changeDateformatWhileGet($model)
{
    $modelColumnData = $model->attributes;
    $dbColumns = $model->getTableSchema()->columns;
    foreach ($dbColumns as $key => $value) 
    {
        if($value->type == "date")
        {
            if(isset($modelColumnData[$key]))
            {
                if($modelColumnData[$key] != "")
                {
                    $modelColumnData[$key] = changeDateFormat($modelColumnData[$key],'Y-m-d','d-m-Y');
                }
            }
        }
    }
    $model->attributes = $modelColumnData;
    return $model;
}


function getCurrentControllerNameFromId()
{
    $controllerName = Yii::$app->controller->id;
    $controllerName = str_replace("-", " ", $controllerName);
    $controllerName = ucwords($controllerName);
    $controllerName = str_replace(" ", "", $controllerName);
    
    return $controllerName;
}

function getCurrentControllerNameForFieldContainer()
{
    $controllerName = Yii::$app->controller->id;
    $controllerName = str_replace("-", "", $controllerName);
    return $controllerName;
}


function changeDateFormat($dateString,$inputFormat = 'd-m-Y',$outputFormat = 'Y-m-d')
{
    $myDateTime = \DateTime::createFromFormat($inputFormat, $dateString);
    $newDateString = $dateString;
    if($myDateTime!="")
    {
        $newDateString = $myDateTime->format($outputFormat); 
    }
    else
    {
//        display_array($dateString);exit;
    }
    
    return $newDateString;
    
}

function arrayToDoubleArray($array)
{
    $doubleArray = array();
    foreach ($array as &$value) {
        $value = trim($value, ' ');
        $doubleArray[$value] = $value;
    }
    return $doubleArray;
}



function dependancyOfDependants($query,$model,$center_id_key_string,$dependentKey="center_list")
{
//    display_array($query);
//        display_array($model);
//            display_array($center_id_key_string);
//                display_array($dependentKey);
//                exit;
    
//    if(isset($model->$center_id_key_string))
//    {
        $dependentModel = checkAndGetDependant();
        
        
        if($dependentModel != null)
        {
            if(checkAndGetDependant()=='')
            {
                $dependentModel->$dependentKey = '[]';
            }
            else if($dependentModel->$dependentKey == "")
            {
                $dependentModel->$dependentKey = '[]';
            }
            
            
            
            $query = $query->andWhere(['in',$center_id_key_string,  json_decode($dependentModel->$dependentKey)]);
            
//            display_array($center_id_key_string);
//            display_array($dependentModel);
//            display_array($query);
//            display_array($query->all());
//            exit;
            
        }
//    }
    return $query;
}
function dependancyOfBlockStatus($query,$model)
{
    if(checkIsAdmin() == false)
    {
        if(isset($model->block_status))
        {
            $query = $query->andWhere(['block_status'=>'']);
        }
    }
    return $query;
}


function getTotalMarksFrom()
{
    $total_marks_from = 10;
    return $total_marks_from;
}

function display_array($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


function reportActionForIdex($thism,$dataProvider)
{
    if(isset($_REQUEST['report']))
        {
            if($_REQUEST['report']!="")
            {
                return $thism->render('report', [
                    'dataProvider' => $dataProvider,
                ]);
                
                exit;
            }
        }
}

function getLevelTypeArray()
{
    $levelTypeArray = array();
    $levelTypeArray[] = 'CM';
    $levelTypeArray[] = 'Center Manager';
    $levelTypeArray[] = 'Partner';
    $levelTypeArray[] = 'Admin';
    
    return $levelTypeArray;
}


function getCenters()
{
    $centers = array();
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if($_SESSION['login_info'])
    {
        if($_SESSION['login_info']->centers != '')
        {
            $centers = json_decode($_SESSION['login_info']->centers);

        }
    }
    return $centers;
}



function checkAndGetDependant()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['login_info']))
    {

        $loginModel = unserialize(serialize($_SESSION['login_info']));
        $dependentModel = \app\models\Dependants::find()->where(['users_id'=>$loginModel->id])->one();
        return $dependentModel;
    }
    return null;
}


function getCurrentUserId()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['login_info']))
    {

        $loginModel = unserialize(serialize($_SESSION['login_info']));
        return $loginModel->id;
    }
    return "";
}

function checkIsProgramManager()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['login_info']))
    {

        $loginModel = unserialize(serialize($_SESSION['login_info']));
        if($loginModel->user_type == 'Program Manager')
        {
            return true;
        }
    }
    return false;
}

function checkIsAdmin()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['login_info']))
    {

        $loginModel = unserialize(serialize($_SESSION['login_info']));
        if($loginModel->user_type == 'Admin')
        {
            return true;
        }
    }
    return false;
}


function checkAuthenticationToAction($action)
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if(isset($_SESSION['login_info']))
    {
        $loginModel = unserialize(serialize($_SESSION['login_info']));


        $userLevelModel = UserLevels::findOne($loginModel->user_level);


        $level_authenticationsString = $userLevelModel->level_authentications;
        if( strpos($level_authenticationsString, $action) !== false )
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
    else
    {
        return false;
    }
}


function getMyID()
{
    $action = Yii::$app->urlManager->parseRequest(Yii::$app->request);
        
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if(isset($_SESSION['login_info']))
    {
        $loginModel = unserialize(serialize($_SESSION['login_info']));

        return $loginModel->id;
    }
    
    return '';
    
}

function checkAuthentication($this1)
{
    
    
    $action = Yii::$app->urlManager->parseRequest(Yii::$app->request);
        
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    
    if(isset($_SESSION['login_info']))
        {
         
//    var_dump($_SESSION);
//    exit;
            
        
            $loginModel = unserialize(serialize($_SESSION['login_info']));
            
            $pageAuthentications = app\models\PageAuthentications::find()->where(['level_id'=>$loginModel->user_level,'authentication'=>$action[0]])->one();
            if($pageAuthentications == null)
            {
                if(!isset($_POST['from_approvals']))
                {
                    $this1->redirect('index.php?r=users/permission-denied');   
                }
            }
            
            
//            $userLevelModel = UserLevels::findOne($loginModel->user_level);
//             
//            $level_authenticationsString = $userLevelModel->level_authentications;
//            if( strpos($level_authenticationsString, $action[0]) !== false )
//            {
//                
//            }
//            else 
//            {
//                $this1->redirect('index.php?r=users/permission-denied');
//            }
        }
        else
        {
            $this1->redirect('index.php?r=users/login&goback=true');
        }
}
function checkAuthenticationPage($page)
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['login_info']))
    {

        $loginModel = unserialize(serialize($_SESSION['login_info']));

//            $userLevelModel = UserLevels::findOne($loginModel->user_level);
//              $userLevelModel = UserLevels::findOne('2');


        $pageAuthentications = app\models\PageAuthentications::find()->where(['level_id'=>$loginModel->user_level,'authentication'=>$page])->one();
        if($pageAuthentications != null)
        {
            return true;
        }
    }

    return false;
}



function searchInArray1($array, $key, $value) {   
    foreach ($array as $subarray){  
        if (isset($subarray[$key]) && $subarray[$key] == $value)
          return $subarray;       
    } 
}


function checkExistance($array, $key, $value)
{
    $results = searchInArray($array, $key, $value);
    
    if(count($results)>0)
    {
        if(isset($results[0]['value']))
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
    else
    {
        return false;
    }
    
}

function searchInArray($array, $key, $value)
{
    $results = array();

    if (is_array($array))   {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }

        foreach ($array as $subarray) {
            $results = array_merge($results, searchInArray($subarray, $key, $value));
        }
    }

    return $results;    
    
}

?>
