<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    
    public function actionDatalist() {
        $responseArray = array();

        $tableName = $_GET['table_name'];
        
        $modelName = "";
        $tableNameArray = explode('_', $tableName);
        foreach ($tableNameArray as $tableValue) {
            $modelName = $modelName.ucfirst($tableValue);
        }
        $modelName = "app\models\\".$modelName;
        
        $responseArray['table_name'] = $_GET['table_name'];
        $milliseconds = round(microtime(true) * 1000);
        $responseArray['timestamp'] = $milliseconds;
        $modelBlank = new $modelName();
        $responseArray["labels"] = $modelBlank->attributeLabels();

        $search_params = array();
        if(isset($_POST['search_params']))
        {
            $search_params = json_decode($_POST['search_params'],true);
        }
        
        if (isset($_GET["timestamp"])) {
            $model = $modelName::find()->asArray()->where(['>', 'timestamp', $_GET["timestamp"]])
                    ->andWhere($search_params)->all();
//                     ->andWhere(['camp_coordinator'=>$camp_coordinator])->all();
        } else {
            $model = $modelName::find()->asArray()
                    ->andWhere($search_params)->all();
//                    ->andWhere(['camp_coordinator'=>$camp_coordinator])->all();
        }
        $responseArray["data"] = $model;
        
        //---ExistingIds
        $existing_ids = $modelName::find()->select(['id'])->asArray()
                    ->andWhere($search_params)->all();
        $responseArray["existing_ids"] = $existing_ids;

        
        //--Validations
//        CommingSoon---

        echo json_encode($responseArray);
        exit;
    }
    
    
    public function actionSubmit() {
        
//        $ Yii::$app->controller;
        
        set_time_limit(0);
        $newAddedData = array();

//        display_array($_POST);
        if (isset($_POST['body'])) {


            $body = json_decode($_POST['body'], true);
            
//            display_array($body);
//            exit;
            
            if(isset($body['table_name']))
            {
                
                
                //---GetTableand model name
                $controllerName = str_replace("_", "-", $body['table_name']);
                $tablename = $body['table_name'];
                $capitalTableName = $body['model_name'];

                $modelName = "app\models\\";
                $modelName = $modelName.$capitalTableName;
                //---




                $model = $capitalTableName;
                if (isset($body[$model])) {
                    $Data = $body[$model];

                    for ($i = 0; $i < count($Data); $i++) {

                        if (isset($Data[$i][$model]["id"])) {

                            $Id = $Data[$i][$model]["id"];


                            if (substr_count($Id, 'mid') > 0) {
                                $dataModel = new $modelName;
                            } else {
                                $dataModel = $modelName::find()->where(["id" => $Id])->one();
                                if ($dataModel == null) {
                                    $dataModel = new $modelName();
                                }
                            }
                            $dataModel->load($Data[$i]);
                            $milliseconds = round(microtime(true) * 1000);
                            $dataModel->timestamp = $milliseconds;
                            $dataModel->upload_status = '1';
                            $dataModel->save();
                            

                            $newAddedData[$Data[$i][$model]['id']] = $dataModel->id;

                        }
                    }
                }
            }



            echo json_encode($newAddedData);
        }
    }
    
    
    
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    
    public function actionGetAlert($id,$controller)
    {
        ?>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel" style="color: green">Alert</h3>
              </div>
              <div class="modal-body">
                  Are you sure to delete this entry??
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="window.location = 'index.php?r=<?php echo $controller."/delete&id=".$id; ?><?php echo isset($_GET['center_id'])?"&center_id=".$_GET['center_id']:""; ?>';">Yes</button>
              </div>
            </div>
          </div>
        </div>
        <?php
    }
    
    public function actionGetAlertToBlockEnable($id,$controller)
    {
        ?>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel" style="color: green">Alert</h3>
              </div>
              <div class="modal-body">
                  Are you sure to Disable ??
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="window.location = 'index.php?r=<?php echo $controller."/block-enable&id=".$id; ?><?php echo isset($_GET['center_id'])?"&center_id=".$_GET['center_id']:""; ?>';">Yes</button>
              </div>
            </div>
          </div>
        </div>
        <?php
    }
    public function actionGetAlertToBlockDisable($id,$controller)
    {
        ?>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel" style="color: green">Alert</h3>
              </div>
              <div class="modal-body">
                  Are you sure to Enable??
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="window.location = 'index.php?r=<?php echo $controller."/block-disable&id=".$id; ?><?php echo isset($_GET['center_id'])?"&center_id=".$_GET['center_id']:""; ?>';">Yes</button>
              </div>
            </div>
          </div>
        </div>
        <?php
    }
    
    
    
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionCalendar()
    {
        return $this->render('calendar');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
