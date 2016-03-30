<?php

namespace app\controllers;

use Yii;
use app\models\CampFacilitator;
use app\models\CampFacilitatorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CampFacilitatorController implements the CRUD actions for CampFacilitator model.
 */
class CampFacilitatorController extends Controller
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
     * Lists all CampFacilitator models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CampFacilitatorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CampFacilitator model.
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
     * Creates a new CampFacilitator model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        checkAuthentication($this);
        $model = new CampFacilitator();
        
        setTimestamp("CampFacilitator");
        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    
    
     public function actionDatalist() {
        $responseArray = array();

        $responseArray['table_name'] = "camp_facilitator";
        $milliseconds = round(microtime(true) * 1000);
        $responseArray['timestamp'] = $milliseconds;
        $modelBlank = new \app\models\CampFacilitator();
        $responseArray["labels"] = $modelBlank->attributeLabels();

        if (isset($_GET["timestamp"])) {
            $model = CampFacilitator::find()->asArray()->where(['>', 'timestamp', $_GET["timestamp"]])->all();
        } else {
            $model = CampFacilitator::find()->asArray()->all();
        }

        $responseArray["data"] = $model;


        echo json_encode($responseArray);
        exit;
    }
    
    
    /**
     * Updates an existing CampFacilitator model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        checkAuthentication($this);
        $model = $this->findModel($id);

        setTimestamp("CampFacilitator");
        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CampFacilitator model.
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
     * Finds the CampFacilitator model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CampFacilitator the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CampFacilitator::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
