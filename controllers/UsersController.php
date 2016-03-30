<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;


/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'delete' => ['post'],
//                    'api-login' => ['post'],
                ],
            ],
        ];
    }
    
    
    
    public function actionMobileLogin($user_name,$password)
    {
        $response = array();
        $userModel =  Users::find()->where(['user_name'=>$user_name,'password'=>$password])->one();
        if($userModel != null)
        {
            $campCoordinatorModel = \app\models\CampCoordinatorProfile::find()->asArray()->where(['id'=>$userModel->camp_coordinator])->one();
            if($campCoordinatorModel != null)
            {
                $response["data"] = $campCoordinatorModel;
                $response["status"] = 'true';
            }
            else
            {
                $response["data"] = "";
                $response["status"] = 'false';    
            }
        }
        else
        {
            $response["data"] = "";
            $response["status"] = 'false';
        }
       
        echo json_encode($response);
    }
    
    
    public function actionDistrictChangedPartnerLoad($district_ids)
    {
        $district_ids = explode(',',$district_ids);
        $partners = \app\models\Partners::find()->where(['in','id',$district_ids])->all();
        echo Html::listBox("Users[partners]", [], ArrayHelper::map($partners, "id", "partner_name"), ['multiple'=>true,'class'=>'form-control','onchange'=>'partner_changed(this)','id'=>'users-partners']);
    }
    
    public function actionDistrictChangedCenterLoad($district_ids)
    {
        $district_ids = explode(',',$district_ids);
        $centers = \app\models\Centers::find()->where(['in','center_id',$district_ids])->all();
        echo Html::listBox("Users[centers]", [], ArrayHelper::map($centers, "center_id", "center_name"), ['multiple'=>true,'class'=>'form-control','id'=>'users-centers']);
    }
    
    public function actionPartnerChangedCenterLoad($partner_ids)
    {
        $partner_ids = explode(',',$partner_ids);
        $centers = \app\models\Centers::find()->where(['in','center_id',$partner_ids])->all();
//        echo "df";
        echo Html::listBox("Users[centers]", [], ArrayHelper::map($centers, "center_id", "center_name"), ['multiple'=>true,'class'=>'form-control','id'=>'users-centers']);
    }
    
    
    
    public function actionLoadDcpContainer($type)
    {
        $type = getLevelTypeArray()[$type];
        
        
        if($type == 'CM')
        {
            echo "<div id='districts_container'>";
            echo Html::listBox("Users[districts]", [], ArrayHelper::map(\app\models\District::find()->all(), "id", "district_name"), ['multiple'=>true,'class'=>'form-control','onchange'=>'district_changed(this)','id'=>'users-districts']);
            echo "</div>";
            
            echo '<br/>';
            
            echo "<div id='partners_container'>";
            echo Html::listBox("Users[partners]", [], ArrayHelper::map(\app\models\Partners::find()->all(), "id", "partner_name"), ['multiple'=>true,'class'=>'form-control','onchange'=>'partner_changed(this)','id'=>'users-partners']);
            echo "</div>";
            
            echo '<br/>';
            
            echo "<div id='centers_container'>";
            echo Html::listBox("Users[centers]", [], ArrayHelper::map(\app\models\Centers::find()->all(), "center_id", "center_name"), ['multiple'=>true,'class'=>'form-control','id'=>'users-centers']);
            echo "</div>";
        }
        else if($type == 'Center Manager')
        {
            echo "<div id='districts_container'>";
            echo Html::listBox("Users[districts]", [], ArrayHelper::map(\app\models\District::find()->all(), 
                    "id", "district_name"), ['class'=>'form-control','onchange'=>'district_changed(this)','id'=>'users-districts']);
            echo "</div>";
            
            echo '<br/>';
            
            echo "<div id='partners_container'>";
            echo Html::listBox("Users[partners]", [], ArrayHelper::map(\app\models\Partners::find()->all(), 
                    "id", "partner_name"), ['class'=>'form-control','onchange'=>'partner_changed(this)','onchange'=>'partner_changed(this)','id'=>'users-partners']);
            echo "</div>";
            
            echo '<br/>';
            
            echo "<div id='centers_container'>";
            echo Html::listBox("Users[centers]", [], ArrayHelper::map(\app\models\Centers::find()->all(), 
                    "center_id", "center_name"), ['multiple'=>true,'class'=>'form-control','id'=>'users-centers']);
            echo "</div>";
        }
        else if($type == 'Partner')
        {
            echo "<div id='districts_container'>";
            echo Html::listBox("Users[districts]", [], ArrayHelper::map(\app\models\District::find()->all(), "district_id", "district_name"), ['class'=>'form-control','onchange'=>'district_changed(this)','id'=>'users-districts']);
            echo "</div>";
            
            echo '<br/>';
            
            echo "<div id='partners_container'>";
            echo Html::listBox("Users[partners]", [], ArrayHelper::map(\app\models\Partners::find()->all(), "id", "partner_name"), ['class'=>'form-control','onchange'=>'partner_changed(this)','id'=>'users-partners']);
            echo "</div>";
            
            echo '<br/>';
            
            echo "<div id='centers_container'>";
            echo Html::listBox("Users[centers]", [], ArrayHelper::map(\app\models\Centers::find()->all(), "center_id", "center_name"), ['multiple'=>true,'class'=>'form-control','readonly'=>true,'id'=>'users-centers']);
            echo "</div>";
        }
        
        exit;
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        checkAuthentication($this);
        
        
             
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    
    public function  actionGetDistrict()
    {
        echo "<h4>Districts</h4>";
        echo Html::listBox('Users[districts]', [], ArrayHelper::map(\app\models\District::find()->all(), 'district_id', 'district_name'),['multiple'=>true,'style'=>'width=>300px;','onchange'=>'state_selected(this);','id'=>'users-states']);   
    }
    
    public function actionLoadPartners($district_ids)
    {
        $allPartners = \app\models\Users::find()->where(['user_type'=> array_search('Paetner', getLevelTypeArray())])->all();
        
        $resultPartners = array();
        
        $district_ids = explode(",", $district_ids);
        for($dc=0;$dc<count($district_ids);$dc++)
        {
            $district_id = $district_ids[$dc];
            for($uc=0;$uc<count($allPartners);$uc++)
            {
                $districts = json_decode($allPartners[$uc]->districts);
                if(in_array($district_id, $districts))
                {
                    $resultPartners[] = $allPartners[$uc];
                }
            }
        }
        echo '<h4>Partners</h4>';
        echo Html::listBox('Users[partners]', [], ArrayHelper::map($resultPartners, 'id', 'first_name'),['multiple'=>true,'style'=>'width=>300px;','onchange'=>'state_selected(this);','id'=>'users-states','class'=>'form-control','id'=>'users-partners']);   
    }
    
    
    public function actionLoadCenters($center_ids)
    {
        $allPartners = \app\models\Centers::find()->where(['partner_name'=> array_search('Paetner', getLevelTypeArray())])->all();
        
        $resultPartners = array();
        
        $district_ids = explode(",", $district_ids);
        for($dc=0;$dc<count($district_ids);$dc++)
        {
            $district_id = $district_ids[$dc];
            for($uc=0;$uc<count($allPartners);$uc++)
            {
                $districts = json_decode($allPartners[$uc]->districts);
                if(in_array($district_id, $districts))
                {
                    $resultPartners[] = $allPartners[$uc];
                }
            }
        }
        echo '<h4>Partners</h4>';
        echo Html::listBox('Users[partners]', [], ArrayHelper::map($resultPartners, 'id', 'first_name'),['multiple'=>true,'style'=>'width=>300px;','onchange'=>'state_selected(this);','id'=>'users-states','class'=>'form-control','id'=>'users-partners']);   
    }

        /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        checkAuthentication($this);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    
    
    
    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    //        display_array($_POST);
    //        exit;
        
        
        
        checkAuthentication($this);
        $model = new Users();

        
        
        if (isset($_POST['Users'])) {
            
            
//            if(isset($_POST['Users']['states']))
//            {
//                $_POST['Users']['states'] = json_encode($_POST['Users']['states']);
//            }
//            else
//            {
//                $_POST['Users']['states'] = '';
//            }
//            
//            
//            if(isset($_POST['Users']['centers']))
//            {
//                $_POST['Users']['centers'] = json_encode($_POST['Users']['centers']);
//            }
//            else
//            {
//                $_POST['Users']['centers'] = '';
//            }
            
            
            
//            $_POST['Users']['districts'] = json_encode($_POST['Users']['districts']);
            
            $model->load($_POST);
            
//            display_array($model);
            if($model->save())
            {
                
                $this->save_user_id($model);
                
                
                
                
                
//                $m = Yii::$app->mailer->compose()
//                    ->setFrom('miral@dhwaniris.com')
//                    ->setTo($model->email)
//                    ->setSubject('Credintials of litracy india')
//                    ->setTextBody('User Name : '.$model->user_name.'\n'.'Password : '.$model->password)
//                    ->setHtmlBody('<b>HTML content</b>')
//                    ->send();
                
                
                return $this->redirect(['index', 'id' => $model->id]);
            }
            else {
                $dependantModel = new \app\models\Dependants();
                return $this->render('create', [
                    'model' => $model,
                    'dependantModel'=>$dependantModel
                ]);
            }
        } else {
            
            $dependantModel = new \app\models\Dependants();
            
            return $this->render('create', [
                'model' => $model,
                'dependantModel'=>$dependantModel
            ]);
        }
    }
    
    
    

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        checkAuthentication($this);
        $model = $this->findModel($id);

        if (isset($_POST['Users'])) {
            
//            $_POST['Users']['districts'] = json_encode($_POST['Users']['districts']);
            
            $model->load($_POST);
            
            
//                display_array($model);
//                exit;
//            
            if($model->save())
            {
                
//                $this->save_user_id($model);
                
                
                
                return $this->redirect(['index', 'id' => $model->id]);    
            }
            
        } else {
            
            $dependantModel = \app\models\Dependants::find()->where(['users_id' => "".$model->id])->one();
            
            return $this->render('update', [
                'model' => $model,
                'dependantModel'=>$dependantModel
            ]);
        }
    }
    
    public function actionProfile($id)
    {
        checkAuthentication($this);
        $model = $this->findModel($id);

        if (isset($_POST['Users'])) {
            if(isset($_POST['Users']['states']))
            {
                $_POST['Users']['states'] = json_encode($_POST['Users']['states']);
            }
            else
            {
                $_POST['Users']['states'] = '';
            }
            
            
            if(isset($_POST['Users']['centers']))
            {
                $_POST['Users']['centers'] = json_encode($_POST['Users']['centers']);
            }
            else
            {
                $_POST['Users']['centers'] = '';
            }
            $model->load($_POST);
            if($model->save())
            {
                return $this->redirect(['index', 'id' => $model->id]);    
            }
            
        } else {
            return $this->render('profile', [
                'model' => $model,
            ]);
        }
    }

    
    public function actionLogout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        unset($_SESSION['login_info']);
        return $this->goHome();
    }
    public function actionLogin()
    {
//        display_array($_POST['Users']);
//        exit;
        if(isset($_POST['Users']))
        {
            if (($model = Users::find()->where(['user_name' => $_POST['Users']['user_name'],'password'=>$_POST['Users']['password']])->one()) !== null) 
            {
                
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['login_info'] = $model;
                
//                display_array(unserialize(serialize($_SESSION['login_info'])));
//                exit;
                
//                exit; 
                ob_start();
                if(isset($_GET['goback']))
                {
                    echo '<script>window.location="index.php";</script>';
                    exit;
//                    return $this->goBack();
                }
                else {
                    echo '<script>window.location="index.php";</script>';
                    exit;
//                    return $this->goHome();
                }
            } else {
                $model = new Users();
                return $this->render('login', [
                    'model' => $model,
                    'error'=>'Please enter valid usernme and password'
                ]);
            }
        }
        else {
            $model = new Users();
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionApiLogin()
    {   
        $responseArray = array();
        if(isset($_REQUEST['Users']))
        {
            if (($model = Users::find()->where(['user_name' => $_REQUEST['Users']['user_name'],'password'=>$_REQUEST['Users']['password']])->one()) !== null) 
            {
                $responseArray['status'] = "true";
                $responseArray['data'] = $model->attributes;
                
                
                echo json_encode($responseArray);
                exit;
            } 
            else 
            {
                $responseArray['status'] = "false";
                
                echo json_encode($responseArray);
                exit;
            }
        }
        else {
            
        }
    }
    
    
    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        checkAuthentication($this);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    
    public function actionPermissionDenied()
    {
        return $this->render('permission_denied');
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    protected function findModelUserPass($user,$pass)
    {
        
        if (($model = Users::find()->where(['user_name' => $user,'password'=>$pass])->one()) !== null) {
            return true;
        } else {
            return false;
        }
    }
    
    protected function save_user_id($model)
    {
        if(isset($_POST['Dependants']))
        {
            
            $dependantModel = \app\models\Dependants::find()->where(['users_id' => "".$model->id])->one();
            
            if($dependantModel == null)
            {
                $dependantModel = new \app\models\Dependants();
            }
            
            
            $_POST['Dependants']['center_list'] = isset($_POST['Dependants']['center_list'])?json_encode($_POST['Dependants']['center_list']):'';
            $_POST['Dependants']['partner_list'] = isset($_POST['Dependants']['partner_list'])?json_encode($_POST['Dependants']['partner_list']):'';

            $_POST['Dependants']['state_list'] = isset($_POST['Dependants']['state_list'])?json_encode($_POST['Dependants']['state_list']):'';
            $_POST['Dependants']['district_list'] = isset($_POST['Dependants']['district_list'])?json_encode($_POST['Dependants']['district_list']):'';
            
            $_POST['Dependants']['users_id'] = "".$model->id."";

                    
            $dependantModel->load($_POST);
            
            
                    
            $dependantModel->save();
        }
    }
}
