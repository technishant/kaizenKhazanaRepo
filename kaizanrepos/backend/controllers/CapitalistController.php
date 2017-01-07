<?php

namespace backend\controllers;

use Yii;
use frontend\models\Capitalist;
use frontend\models\CapitalistSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CapitalistController implements the CRUD actions for Capitalist model.
 */
class CapitalistController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className()
            ],
        ];
    }

    /**
     * Lists all Capitalist models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CapitalistSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Capitalist model.
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
     * Creates a new Capitalist model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Capitalist();

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try{
                $uploadedFile = UploadedFile::getInstance($model, 'profile_photo');
                if($uploadedFile) {
                    $extensionName = $uploadedFile->extension;
                    $fileName = time().'_'.uniqid().'.'.$extensionName;
                    $model->profile_photo = $fileName;
                }
                if($model->validate() && $model->save()) {
                    if($uploadedFile) {
                        $uploadedFile->saveAs(Yii::getAlias('@frontend') . '/web/uploads/capitalist_images/'.$fileName);
                    }
                    $transaction->commit();
                    return $this->redirect(['index']);
                }
            } catch (Exception $ex) {
                $transaction->rollback();
                @unlink(Yii::getAlias('@frontend') . '/web/uploads/capitalist_images/' . $fileName);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Capitalist model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Capitalist model.
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
     * Finds the Capitalist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Capitalist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Capitalist::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
