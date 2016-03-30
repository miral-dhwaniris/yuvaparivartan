<?php

namespace app\controllers;

use Yii;
use app\models\Camp;
use app\models\CampSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CampController implements the CRUD actions for Camp model.
 */
class CampController extends Controller
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
     * Lists all Camp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CampSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Camp model.
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
     * Creates a new Camp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        checkAuthentication($this);
        $model = new Camp();

        changeDateformatWhileSave($model);
        setTimestamp("Camp");
        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    

    public function actionDatalist($camp_coordinator) {
        $responseArray = array();

        $responseArray['table_name'] = "camp";
        $milliseconds = round(microtime(true) * 1000);
        $responseArray['timestamp'] = $milliseconds;
        $modelBlank = new Camp();
        $responseArray["labels"] = $modelBlank->attributeLabels();

        if (isset($_GET["timestamp"])) {
            $model = Camp::find()->asArray()->where(['>', 'timestamp', $_GET["timestamp"]])
                    ->andWhere(['camp_coordinator'=>$camp_coordinator])->all();
        } else {
            $model = Camp::find()->asArray()
                    ->andWhere(['camp_coordinator'=>$camp_coordinator])->all();
        }

        $responseArray["data"] = $model;


        echo json_encode($responseArray);
        exit;
    }
    
    
    
    /**
     * Updates an existing Camp model.
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
        setTimestamp("Camp");
        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Camp model.
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
     * Finds the Camp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Camp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Camp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
