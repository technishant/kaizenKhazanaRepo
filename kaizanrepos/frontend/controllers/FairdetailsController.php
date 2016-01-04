<?php

namespace frontend\controllers;

use Yii;
use common\models\FairDetails;
use common\models\FairDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
/**
 * FairdetailsController implements the CRUD actions for FairDetails model.
 */
class FairdetailsController extends Controller
{
  
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
     * Lists all FairDetails models.
     * @return mixed
     */
    public function actionIndex()
    {        
        $searchModel = new FairDetailsSearch();
        $dataProvider = new ActiveDataProvider([
                'query' => FairDetails::find()->orderBy('id DESC'),
                'pagination' => [
                    'pageSize' => 5
                ]
            ]);
        $paramsArray=Yii::$app->request->queryParams;
        $dataProvider = $searchModel->search($paramsArray); 
        $dataProvider->pagination->pageSize=5;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            
        ]);
    }
    
    public function actionWatch() {
        $searchModel = new FairDetailsSearch();
        $dataProvider = new ActiveDataProvider([
                'query' => FairDetails::find()->orderBy('id DESC'),
                'pagination' => [
                    'pageSize' => 5
                ]
            ]);
        
        $id= base64_decode(Yii::$app->request->queryParams['id']);
        $currentVideo=  $this->findModel($id);
        return $this->render('watchvideos', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'currentVideo' => $currentVideo,
        ]);
    }
    /**
     * Displays a single FairDetails model.
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
     * Creates a new FairDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
  
    /**
     * Finds the FairDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FairDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FairDetails::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
