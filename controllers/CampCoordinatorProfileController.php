<?php

namespace app\controllers;

use Yii;
use app\models\CampCoordinatorProfile;
use app\models\CampCoordinatorProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CampCoordinatorProfileController implements the CRUD actions for CampCoordinatorProfile model.
 */
class CampCoordinatorProfileController extends Controller
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
     * Lists all CampCoordinatorProfile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CampCoordinatorProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    
     public function actionDatalist() {
        $responseArray = array();

        $responseArray['table_name'] = "camp_coordinator_profile";
        $milliseconds = round(microtime(true) * 1000);
        $responseArray['timestamp'] = $milliseconds;
        $modelBlank = new \app\models\CampCoordinatorProfile();
        $responseArray["labels"] = $modelBlank->attributeLabels();

        if (isset($_GET["timestamp"])) {
            $model = CampCoordinatorProfile::find()->asArray()->where(['>', 'timestamp', $_GET["timestamp"]])->all();
        } else {
            $model = CampCoordinatorProfile::find()->asArray()->all();
        }

        $responseArray["data"] = $model;


        echo json_encode($responseArray);
        exit;
    }
    
    /**
     * Displays a single CampCoordinatorProfile model.
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
     * Creates a new CampCoordinatorProfile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        checkAuthentication($this);
        $model = new CampCoordinatorProfile();

        setTimestamp('CampCoordinatorProfile');
        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CampCoordinatorProfile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        checkAuthentication($this);
        $model = $this->findModel($id);

        setTimestamp('CampCoordinatorProfile');
        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CampCoordinatorProfile model.
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
     * Finds the CampCoordinatorProfile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CampCoordinatorProfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CampCoordinatorProfile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
