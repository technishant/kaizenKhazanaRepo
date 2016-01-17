<?php

namespace backend\controllers;

use Yii;
use common\models\Entrepreneur;
use common\models\EntrepreneurSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use FFMpeg\FFMpeg;
use yii\imagine\Image;

/**
 * EntrepreneurController implements the CRUD actions for Entrepreneur model.
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
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
    public function actionCreate() {
        $model = new Entrepreneur();
        $model->scenario = 'create';
        if ($model->load(Yii::$app->request->post())) {

            $model->attachmentfile = Yii::$app->fileupload->uploadFile($model, 'attachmentfile');
            if ($model->attachmentfile !== false && $model->attachmenttype=='video') {
                $path1 = Yii::$app->fileupload->getUploadedFile(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur');                
                $model->attachment = pathinfo($path1, PATHINFO_FILENAME) . '.mp4';
                $videoPath = Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/' . $model->attachment;
                $thumbname = Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/thumb__' . pathinfo($path1, PATHINFO_FILENAME) . '.jpg';
            }
            elseif($model->attachmentfile !== false && $model->attachmenttype=='image'){                
                $path1 = Yii::$app->fileupload->getUploadedFile(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur');                                
                $model->attachment = pathinfo($path1, PATHINFO_BASENAME);
            }
            if ($model->validate()) {
                if ($model->attachmentfile !== FALSE && $model->attachmenttype=='video') {                   
                        $tmpname = $model->attachmentfile->tempName;
                        $size = "269*179";
                        $getFromSecond = 2;
                        $thumbcmd = "ffmpeg -i $tmpname -an -ss $getFromSecond -s $size $thumbname 2>&1";
                        shell_exec($thumbcmd);
                        $videoInfo = shell_exec("ffprobe -v quiet -print_format json -show_format -show_streams $tmpname 2>&1");
                        $videoInfoArray = json_decode($videoInfo);
                        $videoHeight = $videoInfoArray->streams[0]->height; //480
                        $videoWidth = $videoInfoArray->streams[0]->width; //720    
                        if ($videoWidth > 720 || $videoHeight > 720) { //if video resolution is high then convert video
                            $cmd = shell_exec("ffmpeg -i  $tmpname -c:v libx264 -s 720*480  $videoPath 2>&1");
                        } else {

                            $cmd = shell_exec("ffmpeg -i $tmpname -c:v libx264 $videoPath 2>&1");
                        }
                }
                if ($model->save()) {                                           
                    if ($model->attachmentfile !== FALSE && $model->attachmenttype=='image') {
                        $thumb1path = pathinfo($path1, PATHINFO_DIRNAME) . '/thumb__' . pathinfo($path1, PATHINFO_BASENAME);
                        $thumb2path = pathinfo($path1, PATHINFO_DIRNAME) . '/thumb2__' . pathinfo($path1, PATHINFO_BASENAME);
                        $model->attachmentfile->saveAs($path1);
                        Image::thumbnail($path1, 269, 179)->save(($thumb1path), ['quality' => 80]);
                        Image::thumbnail($path1, 858, 643)->save(($thumb2path), ['quality' => 80]);
                    }
                    Yii::$app->session->setFlash('successKz', 'Entrepreneur saved successfully.');
                    return $this->redirect(['index']);
                }else{
                    Yii::$app->session->setFlash('errorKz', 'Something went wrong while saving entrepreneur details.Please try again.');
                    return $this->render('create', [
                            'model' => $model,
                    ]);
                }
            } else {
                Yii::$app->session->setFlash('errorKz', 'Something went wrong while saving entrepreneur details.Please try again.');
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
     * Updates an existing Entrepreneur model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $oldFile = $model->attachment; //get old filename
        $oldAttachmenttype=$model->attachmenttype;
        $model->scenario = 'update';
        if ($model->load(Yii::$app->request->post())) {
            $model->attachmentfile = Yii::$app->fileupload->uploadFile($model, 'attachmentfile');
            if ($model->attachmentfile !== false && $model->attachmenttype=='video') {
                $path1 = Yii::$app->fileupload->getUploadedFile(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur');
                $model->attachment = pathinfo($path1, PATHINFO_FILENAME) . '.mp4';
                $videoPath = Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/' . $model->attachment;
                $thumbname = Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/thumb__' . pathinfo($path1, PATHINFO_FILENAME) . '.jpg';
            }
            elseif($model->attachmentfile !== false && $model->attachmenttype=='image'){  
                $path1 = Yii::$app->fileupload->getUploadedFile(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur');                                
                $model->attachment = pathinfo($path1, PATHINFO_BASENAME);
            }
            if ($model->validate()) {
                if ($model->attachmentfile !== FALSE && $model->attachmenttype=='video') {
                    $tmpname = $model->attachmentfile->tempName;
                    $size = "269*179";
                    $getFromSecond = 2;
                    $thumbcmd = "ffmpeg -i $tmpname -an -ss $getFromSecond -s $size $thumbname 2>&1";
                    shell_exec($thumbcmd);
                    $videoInfo = shell_exec("ffprobe -v quiet -print_format json -show_format -show_streams $tmpname 2>&1");
                    $videoInfoArray = json_decode($videoInfo);
                    $videoHeight = $videoInfoArray->streams[0]->height; //480
                    $videoWidth = $videoInfoArray->streams[0]->width; //720    
                    if ($videoWidth > 720 || $videoHeight > 720) { //if video resolution is high then convert video
                        $cmd = shell_exec("ffmpeg -i  $tmpname -c:v libx264 -s 720*480  $videoPath 2>&1");
                    } else {

                        $cmd = shell_exec("ffmpeg -i $tmpname -c:v libx264 $videoPath 2>&1");
                    }                   
                    
                }
                if ($model->save()) {
                    if ($model->attachmentfile !== FALSE && $model->attachmenttype=='image') {
                        $thumb1path = pathinfo($path1, PATHINFO_DIRNAME) . '/thumb__' . pathinfo($path1, PATHINFO_BASENAME);
                        $thumb2path = pathinfo($path1, PATHINFO_DIRNAME) . '/thumb2__' . pathinfo($path1, PATHINFO_BASENAME);
                        $model->attachmentfile->saveAs($path1);
                        Image::thumbnail($path1, 269, 179)->save(($thumb1path), ['quality' => 80]);   
                        Image::thumbnail($path1, 858, 643)->save(($thumb2path), ['quality' => 80]);
                    }
                    if ($model->attachmentfile !== FALSE){
                        if($oldAttachmenttype=='video'){
                            if (file_exists(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/' . $oldFile)) {                       
                                chmod(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/' . $oldFile, 0777);
                                unlink(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/' . $oldFile); //removing old video
                            }
                            if (file_exists(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/thumb__' . pathinfo($oldFile, PATHINFO_FILENAME) . '.jpg')) {
                                chmod(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/thumb__' . pathinfo($oldFile, PATHINFO_FILENAME) . '.jpg', 0777);
                                unlink(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/thumb__' . pathinfo($oldFile, PATHINFO_FILENAME) . '.jpg'); //removing old thumb
                            }
                        }else{
                            if (file_exists(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/' . $oldFile)) {                       
                                chmod(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/' . $oldFile, 0777);
                                unlink(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/' . $oldFile); //removing old video
                            }
                            if (file_exists(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/thumb__' . pathinfo($oldFile, PATHINFO_BASENAME))) {
                                chmod(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/thumb__' . pathinfo($oldFile, PATHINFO_BASENAME), 0777);
                                unlink(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/thumb__' . pathinfo($oldFile, PATHINFO_BASENAME)); //removing old thumb
                            }
                        }
                    }
                    Yii::$app->session->setFlash('successKz', 'Entrepreneur details saved successfully.');
                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
                    Yii::$app->session->setFlash('errorKz', 'Something went wrong while saving fair details.Please try again.');
                    return $this->render('update', [
                                'model' => $model,
                    ]);
                }
            } else {
                Yii::$app->session->setFlash('errorKz', 'Something went wrong while saving fair details.Please try again.');
                return $this->render('update', [
                            'model' => $model,
                ]);
            }
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Entrepreneur model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $oldFile = $model->attachment; //get old filename
        $oldAttachmenttype=$model->attachmenttype;
        if($oldAttachmenttype=='video'){
            if (file_exists(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/' . $oldFile)) {                       
                chmod(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/' . $oldFile, 0777);
                unlink(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/' . $oldFile); //removing old video
            }
            if (file_exists(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/thumb__' . pathinfo($oldFile, PATHINFO_FILENAME) . '.jpg')) {
                chmod(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/thumb__' . pathinfo($oldFile, PATHINFO_FILENAME) . '.jpg', 0777);
                unlink(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/thumb__' . pathinfo($oldFile, PATHINFO_FILENAME) . '.jpg'); //removing old thumb
            }
        }else{
            if (file_exists(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/' . $oldFile)) {                       
                chmod(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/' . $oldFile, 0777);
                unlink(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/' . $oldFile); //removing old video
            }
            if (file_exists(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/thumb__' . pathinfo($oldFile, PATHINFO_BASENAME))) {
                chmod(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/thumb__' . pathinfo($oldFile, PATHINFO_BASENAME), 0777);
                unlink(Yii::getAlias('@frontend') . '/web/uploads/entrepreneur/thumb__' . pathinfo($oldFile, PATHINFO_BASENAME)); //removing old thumb
            }
        }
        $model->delete();
        return $this->redirect(['index']);
    }

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
