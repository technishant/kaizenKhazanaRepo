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
        $categories = Category::find()->roots()->all();
        return $this->render('index', ['model' => $model, 'categories' => $categories]);
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
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
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
                        $session->set('username', $user->first_name . " " . $user->last_name);
                    } else {
                        $session->close();
                        $session->destroy();
                        $session->open();
                        $session->set('email', $user->email);
                        $session->set('username', $user->first_name . " " . $user->last_name);
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

    public function actionCategoryclick($name) {
        $menu = array();
        $rootModal = Category::find()->roots()->all();
        foreach($rootModal as $root) {
            $tempRoot = array();
            $tempRoot['content'] = $root->name;
            $tempRoot['id'] = $root->id;
            $level1Modal = Category::findOne(['id' => $root->id])->children(1)->all();
            if(!empty($level1Modal)){
                $menuLevel1 = array();
                foreach($level1Modal as $level1) {
                    $tempLevel1 = array();
                    $tempLevel1['content'] = $level1->name;
                    $tempLevel1['id'] = $level1->id;
                    $level2Modal = Category::findOne(['id' => $level1->id])->children(1)->all();
                    if(!empty($level2Modal)) {
                        $menuLevel2 = array();
                        foreach ($level2Modal as $level2) {
                            $tempLevel2 = array();
                            $tempLevel2['content'] = $level2->name;
                            $tempLevel1['id'] = $level2->id;
                            array_push($menuLevel2, $tempLevel2);
                        }
                        $tempLevel1['children'] = $menuLevel2;
                    }
                    array_push($menuLevel1, $tempLevel1);
                }
                $tempRoot['children'] = $menuLevel1;
            }
            array_push($menu, $tempRoot);
        }
        return $this->render('categoryClick', ['menu' => $menu]);
    }
    
    public function actionTest() {
//        $countries = new Category(['name' => 'Category2']);
//        $countries->makeRoot();
        $countries =  Category::findOne(['id' => 30]);
        $russia = new Category(['name' => 'Category2.1.1']);
        $russia->prependTo($countries);
    }

}
