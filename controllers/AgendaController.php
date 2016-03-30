<?php

namespace app\controllers;

use Yii;
use app\models\Agenda;
use app\models\AgendaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AgendaController implements the CRUD actions for Agenda model.
 */
class AgendaController extends Controller
{
    public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Agenda models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AgendaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    
    
    
    
    public function actionDatalist($camp_coordinator) {
        $responseArray = array();

        $responseArray['table_name'] = "agenda";
        $milliseconds = round(microtime(true) * 1000);
        $responseArray['timestamp'] = $milliseconds;
        $modelBlank = new Agenda();
        $responseArray["labels"] = $modelBlank->attributeLabels();

        if (isset($_GET["timestamp"])) {
            $model = Agenda::find()->asArray()->where(['>', 'timestamp', $_GET["timestamp"]])
                     ->andWhere(['camp_coordinator'=>$camp_coordinator])->all();
        } else {
            $model = Agenda::find()->asArray()
                    ->andWhere(['camp_coordinator'=>$camp_coordinator])->all();
        }

        $responseArray["data"] = $model;


        echo json_encode($responseArray);
        exit;
    }

    
    

    /**
     * Displays a single Agenda model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Agenda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        checkAuthentication($this);
        $model = new Agenda();

        
        changeDateformatWhileSave($model);
        setTimestamp("Agenda");
        if ($model->load($_POST) && $model->save()) {
            if(isset($_GET['other']['date']))
            {
                return $this->redirect(['index', 'date' => $_GET['other']['date']]);
            }
            else
            {
                return $this->redirect(['index']);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Agenda model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        checkAuthentication($this);
        $model = $this->findModel($id);
        $model = changeDateformatWhileGet($model);

        
        changeDateformatWhileSave($model);
        setTimestamp("Agenda");
        if ($model->load($_POST) && $model->save()) {
            if(isset($_GET['other']['date']))
            {
                return $this->redirect(['index', 'date' => $_GET['other']['date']]);
            }
            else
            {
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Agenda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Agenda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Agenda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Agenda::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
