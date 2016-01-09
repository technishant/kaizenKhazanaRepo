<?php

namespace backend\controllers;

use Yii;
use common\models\FairDetails;
use common\models\FairDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use FFMpeg\FFMpeg;
use yii\imagine\Image;
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
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            
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
    public function actionCreate()
    {
        $model = new FairDetails();
        $model->scenario='create';
        if($model->load(Yii::$app->request->post())){
           
            $model->attachmentfile = Yii::$app->fileupload->uploadFile($model, 'attachmentfile');
                if ($model->attachmentfile !== false) {
                    $path1 = Yii::$app->fileupload->getUploadedFile(Yii::getAlias('@frontend') . '/web/uploads/fairvideos');
                    $model->attachment = pathinfo($path1, PATHINFO_FILENAME).'.mp4';
                    $videoPath = Yii::getAlias('@frontend') . '/web/uploads/fairvideos/'.$model->attachment;
                    $thumbname = Yii::getAlias('@frontend') . '/web/uploads/fairvideos/'.pathinfo($path1, PATHINFO_FILENAME).'.jpg';
                   
                }
            if ($model->validate() && $model->save()) {
                    if ($model->attachmentfile !== FALSE) {
                            $model->attachmentfile->saveAs($path1);  
                            $videoconvert="ffmpeg -i $path1 -c:v libx264 $videoPath 2>&1";
                            shell_exec($videoconvert);
                            $size="565*283";
                            $getFromSecond=2;
                            $thumbcmd="ffmpeg -i $path1 -an -ss 2 -s $size $thumbname 2>&1";
                            shell_exec($thumbcmd);
                            if(file_exists($path1)){
                            chmod($path1, 0777);
                            unlink($path1);
                            }
                        }
                        Yii::$app->session->setFlash('successKz', 'Fair details saved successfully.');
                        return $this->render('create', [
                                    'model' => $model,
                            ]);
                }else{
                        Yii::$app->session->setFlash('errorKz', 'Something went wrong while saving fair details.Please try again.');
                        return $this->render('create', [
                                    'model' => $model,
                        ]);
                    
                }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FairDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario='update';
        if($model->load(Yii::$app->request->post())){
            
            $model->attachmentfile = Yii::$app->fileupload->uploadFile($model, 'attachmentfile');            
            if ($model->attachmentfile !== false) {
                $oldFile=$model->attachment; //get old filename
                $path1 = Yii::$app->fileupload->getUploadedFile(Yii::getAlias('@frontend') . '/web/uploads/fairvideos');
                $model->attachment = pathinfo($path1, PATHINFO_FILENAME).'.mp4';
                $videoPath = Yii::getAlias('@frontend') . '/web/uploads/fairvideos/'.$model->attachment;
                $thumbname = Yii::getAlias('@frontend') . '/web/uploads/fairvideos/'.pathinfo($path1, PATHINFO_FILENAME).'.jpg';

            }
            if ($model->validate() && $model->save()) {
                    if ($model->attachmentfile !== FALSE) {
                            $model->attachmentfile->saveAs($path1);
                            $videoconvert="ffmpeg -i $path1 -c:v libx264 $videoPath 2>&1";
                            shell_exec($videoconvert);
                            $size="565*283";
                            $getFromSecond=2;
                            $thumbcmd="ffmpeg -i $path1 -an -ss 2 -s $size $thumbname 2>&1";
                            shell_exec($thumbcmd);                            
                            if(file_exists($path1)){
                            chmod($path1, 0777);
                            unlink($path1); //removing original video
                            }
                            if(file_exists(Yii::getAlias('@frontend') . '/web/uploads/fairvideos/'.$oldFile)){
                            chmod(Yii::getAlias('@frontend') . '/web/uploads/fairvideos/'.$oldFile, 0777);
                            unlink(Yii::getAlias('@frontend') . '/web/uploads/fairvideos/'.$oldFile); //removing old video
                            }
                            if(file_exists(Yii::getAlias('@frontend') . '/web/uploads/fairvideos/'.pathinfo($oldFile,PATHINFO_FILENAME).'.jpg')){
                            chmod(Yii::getAlias('@frontend') . '/web/uploads/fairvideos/'.pathinfo($oldFile,PATHINFO_FILENAME).'.jpg', 0777);
                            unlink(Yii::getAlias('@frontend') . '/web/uploads/fairvideos/'.pathinfo($oldFile,PATHINFO_FILENAME).'.jpg'); //removing old thumb
                            }
                        }
                        Yii::$app->session->setFlash('successKz', 'Fair details saved successfully.');
                        return $this->redirect(['view', 'id' => $model->id]);
                }else{
                        Yii::$app->session->setFlash('errorKz', 'Something went wrong while saving fair details.Please try again.');
                        return $this->render('update', [
                'model' => $model,
            ]);
                    
                }
            
        }else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FairDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);        
        $videoPath = Yii::getAlias('@frontend') . '/web/uploads/fairvideos/'.$model->attachment;
        if(file_exists($videoPath)){
        chmod($videoPath, 0777);
        unlink($videoPath);
        }
        if(file_exists(Yii::getAlias('@frontend') . '/web/uploads/fairvideos/'.pathinfo($videoPath,PATHINFO_FILENAME).'.jpg')){
        chmod(Yii::getAlias('@frontend') . '/web/uploads/fairvideos/'.pathinfo($videoPath,PATHINFO_FILENAME).'.jpg', 0777);
        unlink(Yii::getAlias('@frontend') . '/web/uploads/fairvideos/'.pathinfo($videoPath,PATHINFO_FILENAME).'.jpg'); //removing old thumb
        }
        $model->delete();
        return $this->redirect(['index']);
    }

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
