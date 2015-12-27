<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Kaizen;
use frontend\models\KaizenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Menu;
use frontend\models\Category;
use yii\helpers\ArrayHelper;
use \yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * KaizenController implements the CRUD actions for Kaizen model.
 */
class KaizenController extends Controller {

    public function behaviors() {
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
     * Lists all Kaizen models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new KaizenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kaizen model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionCategorychild() {
        $id = $_POST['catid'];
        $subCat = $_POST['subcat'];
        $onChange = '';
        if ($subCat == '1') {
            $onChange = 'getSubCatlevel2(this.value,"' . Yii::$app->homeUrl . '")'; //ajax function in kaizen view for 3 level category
            $fieldSubCat = 'categoryLevel3';
        } else {
            $fieldSubCat = 'categoryLevel2';
        }
        $subCategory = \frontend\models\Category::findOne(['id' => $id]);
        $leaves = $subCategory->children(1)->asArray()->all();
        if ($leaves) {
            echo Html::dropDownList('Kaizen[' . $fieldSubCat . ']', null, ArrayHelper::map($leaves, 'id', 'name'), ['class' => 'form-control', 'onchange' => $onChange, 'prompt' => 'Select']);
        }
    }

    public function actionTest() {
        $countries = Category::findOne(['id' => 12]);
        $russia = new Category(['name' => 'japan']);
        $russia->prependTo($countries);
    }

    public function actionCreate() {
        if (\Yii::$app->user->isGuest) {
            return $this->redirect(['/site/login']);
        }
        $model = new Kaizen();
        $model->type = 0;
        if (Yii::$app->request->post()) {
            $session = \Yii::$app->session;
            $model->recordstatus = 1;
            $model->postedby = \Yii::$app->user->id;
            $model->posteddate = date('Y-m-d');
            $model->mode = 'draft';
            $model->approvedby = '0';
        }
        if ($model->load(Yii::$app->request->post())) {
            if ($model->type == 0) {
                $model->kzfilebefore = Yii::$app->fileupload->uploadFile($model, 'kzfilebefore');
                if ($model->kzfilebefore !== false) {
                    $path1 = Yii::$app->fileupload->getUploadedFile();
                }
                $model->kzfileafter = Yii::$app->fileupload->uploadFile($model, 'kzfileafter');
                if ($model->kzfileafter !== false) {
                    $path2 = Yii::$app->fileupload->getUploadedFile();
                }
                if ($model->validate()) {
                    $model->attachmentbefore = pathinfo($path1, PATHINFO_BASENAME);
                    $model->attachmentafter = pathinfo($path2, PATHINFO_BASENAME);
                    if ($model->save()) {
                        if ($model->kzfilebefore !== FALSE) {
                            $model->kzfilebefore->saveAs($path1);
                        }
                        if ($model->kzfileafter !== FALSE) {
                            $model->kzfileafter->saveAs($path2);
                        }
                        Yii::$app->session->setFlash('successKz', 'Kaizen is saved successfully for reviewing.');
                        return $this->refresh();
                    } else {
                        Yii::$app->session->setFlash('errorKz', 'Something went wrong while saving kaizen.Please try again.');
                        return $this->render('create', [
                                    'model' => $model,
                        ]);
                    }
                }
            } else {
                $model->otherAttachmentFile = Yii::$app->fileupload->uploadFile($model, 'otherAttachmentFile');
                if ($model->otherAttachmentFile !== FALSE) {
                    $otherAttachementPath = Yii::$app->fileupload->getUploadedFile();
                }
                if ($model->validate()) {
                    $model->attachmentother = pathinfo($otherAttachementPath, PATHINFO_BASENAME);
                    if ($model->save()) {
                        if ($model->otherAttachmentFile !== FALSE) {
                            $model->otherAttachmentFile->saveAs($otherAttachementPath);
                        }
                        Yii::$app->session->setFlash('successKz', 'Kaizen is saved successfully for reviewing.');
                        return $this->refresh();
                    } else {
                        Yii::$app->session->setFlash('errorKz', 'Something went wrong while saving kaizen.Please try again.');
                        return $this->render('create', [
                                    'model' => $model,
                        ]);
                    }
                }
            }
            $model->attachmentother = Yii::$app->fileupload->uploadFile($model, 'attachmentother');
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Kaizen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if (Yii::$app->request->post()) {
            $upload_file = $model->uploadFile('upload_file');
            if ($upload_file !== false) {
                $path1 = $model->getUploadedFile();
            }
            $upload_file1 = $model->uploadFile('upload_file1');
            if ($upload_file1 !== false) {
                $path2 = $model->getUploadedFile();
            }
            $model->attachmentbefore = pathinfo($path1, PATHINFO_BASENAME);
            $model->attachmentafter = pathinfo($path2, PATHINFO_BASENAME);
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $upload_file->saveAs($path1);
            $upload_file1->saveAs($path2);
            Yii::$app->session->setFlash('successKz', 'Kaizen updated successfully.');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Kaizen model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kaizen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kaizen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Kaizen::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
