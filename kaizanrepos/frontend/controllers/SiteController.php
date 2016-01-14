<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Session;
use frontend\models\Menu;
use frontend\models\Category;
use slatiusa\nestable\Nestable;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use frontend\models\Kaizen;
use frontend\models\KaizenSearch;
use common\models\FairDetails;
use frontend\models\Capitalist;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successFacebookLogin']
            ],
            'nodeMove' => [
                'class' => 'slatiusa\nestable\NodeMoveAction',
                'modelName' => Category::className(),
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    $session = Yii::$app->session;
                    if (!$session->isActive) {
                        $session->open();
                        $session->set('email', $user->email);
                        $session->set('name', $user->first_name . " " . $user->last_name);
                    } else {
                        $session->close();
                        $session->destroy();
                        $session->open();
                        $session->set('email', $user->email);
                        $session->set('name', $user->first_name . " " . $user->last_name);
                    }
                    return $this->goHome();
                }
            }
        }
        $categories = Category::find()->roots()->all();
        $fairVideos = FairDetails::find()->orderBy('id DESC')->limit('4')->all();
        $capitalistModel = Capitalist::find()->orderBy('id DESC')->limit('4')->all();
        return $this->render('index', ['model' => $model, 'categories' => $categories, 'fairVideos' => $fairVideos, 'capitalistModel' => $capitalistModel]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        $model->loginFrom = 1;
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', ['model' => $model]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout() {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    $session = Yii::$app->session;
                    if (!$session->isActive) {
                        $session->open();
                        $session->set('email', $user->email);
                        $session->set('name', $user->first_name . " " . $user->last_name);
                    } else {
                        $session->close();
                        $session->destroy();
                        $session->open();
                        $session->set('email', $user->email);
                        $session->set('name', $user->first_name . " " . $user->last_name);
                    }
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    public function successFacebookLogin($client) {
        $attributes = $client->getUserAttributes();
        print_r($attributes);
        die;
    }

    public function actionCategoryClick($id = '') {
        $this->view->title = "Kaizen Khazana | Category";
        $menu = array();
        $rootModal = Category::find()->roots()->all();
        $parentActiveId = array();
        /*         * * when form submitted from search box ** */
        $searchModel = new KaizenSearch();
        if ((\Yii::$app->request->get('pg') == 'kzsearch')) {
            $paramsArray = Yii::$app->request->queryParams;
            /*             * * check if searched catgory id has children then search text in children as well ** */
            if (!empty($paramsArray['id'])) {
                $categoryIdSearched = '';
                $categoryIdSearched = $paramsArray['id'];
                $searchedCategoryChildrenArray = array();
                array_push($searchedCategoryChildrenArray, $categoryIdSearched);
                if ($categoryIdSearched != '') { //if category id is set then get children categories if exists
                    $categoryRoot = Category::findOne(['id' => $id]);
                    $searchedCategoryChildren = $categoryRoot->children()->asArray()->all();
                    foreach ($searchedCategoryChildren as $key => $childrenArray) {
                        $searchedCategoryChildrenArray[] = $childrenArray['id'];
                    }
                    $paramsArray['id'] = $searchedCategoryChildrenArray;
                }
            }
            /*             * * check if searched catgory id has children then search text in children as well ends here ** */
            $dataProvider = $searchModel->search($paramsArray);
            /** get active menu list from searched data * */
            $allSearchedData = $dataProvider->getModels();
            foreach ($allSearchedData as $key => $resultData) {
                $categoryIdOfResult = ($resultData->category);
                $parentActiveId[] = $categoryIdOfResult;
                $menuRootNode = Category::findOne(['id' => $categoryIdOfResult]); //get all parent node of this
                $allParents = $menuRootNode->parents()->all();
                foreach ($allParents as $key => $parentArray) {
                    $parentActiveId[] = $parentArray->id;
                }
            }
            /** get active menu list from searched data ends here * */
            $dataProvider = $searchModel->search($paramsArray); //reset data provider
            $dataProvider->pagination->pageSize = 5;
        }
        /*         * * when form submitted from search box ends here ** */
        /*         * * select parent categories in navigation based on ids ** */
        if (!empty($id)) {
            $parentActiveId = array();
            $menuRootNode = Category::findOne(['id' => $id]);
            $allParents = $menuRootNode->parents()->all();
            foreach ($allParents as $key => $parentArray) {
                $parentActiveId[] = $parentArray->id;
            }
            //create data provider with combination of parent and child when root node is clicked
            if ((\Yii::$app->request->get('pg') != 'kzsearch')) {
                $childrenIds = $menuRootNode->children()->asArray()->all();
                $childrenIdarray = array();
                array_push($childrenIdarray, $id); //pushing parent category id 
                foreach ($childrenIds as $key => $childrenArray) {
                    $childrenIdarray[] = $childrenArray['id'];
                }
                if (!empty($childrenIdarray)) {
                    $childrenId = implode(",", $childrenIdarray);
                }
                $dataProvider = new ActiveDataProvider([
                    'query' => Kaizen::find()->where("category IN ($childrenId)")->orderBy('id DESC'),
                    'pagination' => [
                        'pageSize' => 15
                    ]
                ]);
            }
        }
        /*         * * select parent categories in navigation based on ids ** */
        foreach ($rootModal as $root) {

            $tempRoot = array();
            $tempRoot['label'] = $root->name;
            $tempRoot['id'] = $root->id;
            $tempRoot['icon'] = "home";
            $tempRoot['active'] = ($id == $root->id || in_array($root->id, $parentActiveId));
            $tempRoot['url'] = Url::to(['site/category-click', 'id' => $root->id]);
            $level1Modal = Category::findOne(['id' => $root->id])->children(1)->all();

            if (!empty($level1Modal)) {
                $menuLevel1 = array();
                foreach ($level1Modal as $level1) {
                    $tempLevel1 = array();
                    $tempLevel1['label'] = $level1->name;
                    $tempLevel1['id'] = $level1->id;
                    $tempLevel1['icon'] = "";
                    $tempLevel1['active'] = ($id == $level1->id || in_array($level1->id, $parentActiveId));
                    $tempLevel1['url'] = Url::to(['site/category-click', 'id' => $level1->id]);
                    $level2Modal = Category::findOne(['id' => $level1->id])->children(1)->all();
                    if (!empty($level2Modal)) {
                        $menuLevel2 = array();
                        foreach ($level2Modal as $level2) {
                            $tempLevel2 = array();
                            $tempLevel2['label'] = $level2->name;
                            $tempLevel2['id'] = $level2->id;
                            $tempLevel2['icon'] = "";
                            $tempLevel2['active'] = ($id == $level2->id || in_array($level2->id, $parentActiveId));
                            $tempLevel2['url'] = Url::to(['site/category-click', 'id' => $level2->id]);
                            array_push($menuLevel2, $tempLevel2);
                        }
                        $tempLevel1['items'] = $menuLevel2;
                    }
                    array_push($menuLevel1, $tempLevel1);
                }
                $tempRoot['items'] = $menuLevel1;
            }
            array_push($menu, $tempRoot);
        }
        return $this->render('categoryClick', ['id' => $id, 'searchmodel' => $searchModel, 'menu' => $menu, 'dataProvider' => $dataProvider]);
    }

    public function actionTest() {
        $countries = new Category(['name' => 'Mechanical Industry']);
        $countries->makeRoot();
        $countries = new Category(['name' => 'Daily life']);
        $countries->makeRoot();
        $countries = new Category(['name' => 'Agro Industry']);
        $countries->makeRoot();
//        $countries = Category::findOne(['id' => 30]);
//        $russia = new Category(['name' => 'Category2.1.1']);
//        $russia->prependTo($countries);
    }

    public function actionCreateRoll() {
        $auth = \Yii::$app->authManager;
        $adminRole = $auth->getRole('admin');
        $auth->assign($adminRole, 2);
    }

}
