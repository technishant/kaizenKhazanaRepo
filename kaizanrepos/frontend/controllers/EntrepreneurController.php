<?php

namespace frontend\controllers;

use Yii;
use common\models\Entrepreneur;
use common\models\EntrepreneurSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
/**
 * Entrepreneur implements the CRUD actions for Entrepreneur model.
 */
class EntrepreneurController extends Controller
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
     * Lists all Entrepreneur models.
     * @return mixed
     */
    public function actionIndex()
    {        
        $searchModel = new EntrepreneurSearch();
        $dataProvider = new ActiveDataProvider([
                'query' => Entrepreneur::find()->orderBy('id DESC'),
                'pagination' => [
                    'pageSize' => 50
                ]
            ]);
        $paramsArray=Yii::$app->request->queryParams;
        $dataProvider = $searchModel->search($paramsArray); 
        $dataProvider->pagination->pageSize=50;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            
        ]);
    }
    
    public function actionWatch() {
        $searchModel = new EntrepreneurSearch();
        $dataProvider = new ActiveDataProvider([
                'query' => Entrepreneur::find()->orderBy('id DESC'),
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
     * Displays a single Entrepreneur model.
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
     * Creates a new Entrepreneur model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
  
    /**
     * Finds the Entrepreneur model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Entrepreneur the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Entrepreneur::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
