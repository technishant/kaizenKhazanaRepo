<?php

namespace backend\controllers;

use Yii;
use frontend\models\Category;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\CategorySearch;
use yii\web\Session;
use yii\data\ArrayDataProvider;
/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{
    public $layout='backend.php';
    public $rootId='';
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout='backend.php';
        $searchModel= new CategorySearch();
        $roots = Category::find()->roots()->all();
        $dataProvider = new ArrayDataProvider([
          'allModels'=> $roots,
          'key'=>'id',
          'pagination' => [
                    'pageSize' => 5
                ]
        ]);

        return $this->render('index', [
            'searchModel'=>$searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
      /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionManagelevel2category($id)
    {
        $this->layout='backend.php';
        Yii::$app->session->open();               
        if(!empty(Yii::$app->request->get('root'))){
            $id=Yii::$app->request->get('root');
        }
        Yii::$app->session->set('rootId', $id); 
        $searchModel= new CategorySearch();
        $level1Obj = Category::findOne(['id' => $id]);
        $level2Obj = $level1Obj->children(1)->asArray()->all();
        $dataProvider = new ArrayDataProvider([
          'allModels'=> $level2Obj,
          'key'=>'id',
          'pagination' => [
                    'pageSize' => 5
                ]
        ]);
        $currentModel=  $this->findModel($id);
        return $this->render('managesubcategory', [
            'searchModel'=>$searchModel,
            'dataProvider' => $dataProvider,
            'currentModel' => $currentModel, 
        ]);
    }
    
    public function actionManagelevel3category($id)
    {
        $this->layout='backend.php';
        Yii::$app->session->open();               
        if(!empty(Yii::$app->request->get('level2'))){
            $id=Yii::$app->request->get('level2');
        }
        Yii::$app->session->set('level2', $id); 
        $level2Obj = Category::findOne(['id' => $id]);
        $level3Obj = $level2Obj->children(1)->asArray()->all();
        $dataProvider = new ArrayDataProvider([
                'allModels' => $level3Obj,
                'key'=>'id',
                'pagination' => [
                    'pageSize' => 10,
                    ]
                ]);
        $searchModel= new CategorySearch();
        $currentModel=  $this->findModel($id);
        return $this->render('managelevel3category', [
            'searchModel'=>$searchModel,
            'dataProvider' => $dataProvider,
            'currentModel' => $currentModel, 
        ]);
    }
    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionCreateroot()
    {
        $model = new Category();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $catObj = new Category(['name' => $model->name]);
            if ($catObj->makeRoot()) {
                Yii::$app->session->setFlash('successKz', 'Category saved successfully.');
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('errorKz', 'Category not saved successfully.');
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
    
    public function actionCreatelevel2()
    {
        $parentId=  Yii::$app->request->get('root');
        if(empty($parentId))
        {
            return $this->redirect('index');
        }
        $model = new Category();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $catObj = new Category(['name' => $model->name]);
            $parentCategoryObj = Category::findOne(['id' => $parentId]);
            if ($catObj->appendTo($parentCategoryObj)) {
                Yii::$app->session->setFlash('successKz', 'Category saved successfully.');
                return $this->redirect(['category/managelevel2category/'.$parentId.'?root='.$parentId]);
            } else {
                Yii::$app->session->setFlash('errorKz', 'Category not saved successfully.');
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
    
    public function actionCreatelevel3()
    {
        $parentId=  Yii::$app->request->get('root');
        if(empty($parentId))
        {
            return $this->redirect('index');
        }
        $model = new Category();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $catObj = new Category(['name' => $model->name]);
            $parentCategoryObj = Category::findOne(['id' => $parentId]);
            if ($catObj->appendTo($parentCategoryObj)) {
                Yii::$app->session->setFlash('successKz', 'Category saved successfully.');
                return $this->redirect(['category/managelevel3category/'.$parentId.'?root='.$parentId]);
            } else {
                Yii::$app->session->setFlash('errorKz', 'Category not saved successfully.');
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
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('successKz', 'Category saved successfully.');
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
     /**
     * Updates an leve2 category
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatecategorylevel2($id)
    {
        $model = $this->findModel($id);            
        if(!empty(Yii::$app->request->get('root'))){
           $id=Yii::$app->request->get('root');           
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('successKz', 'Category saved successfully.');
            return $this->redirect(['category/managelevel2category/'.$id.'?root='.$id]);
        } else {
            return $this->render('updatecategorylevel2', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionUpdatecategorylevel3($id)
    {
        $model = $this->findModel($id);            
        if(!empty(Yii::$app->request->get('root'))){
           $id=Yii::$app->request->get('root');           
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('successKz', 'Category saved successfully.');
            return $this->redirect(['category/managelevel3category/'.$id.'?root='.$id]);
        } else {
            return $this->render('updatecategorylevel3', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {      
        $node11 =Category::findOne(['id'=>$id]);
        $node11->deleteWithChildren(); // delete node and all descendants 
        Yii::$app->session->setFlash('successKz', 'Category Deleted successfully.');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
