<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\widgets\Menu;
use yii\web\Session;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<?php $session = Yii::$app->session; ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=216973445304358";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <!--  / wrapper \ -->
        <section id="wrapper">
            <!--  / header container \ -->
            <header id="headerCntr">
                <!--  / headerBox \ -->
                <div class="headerBox">
                    <div class="container">

                        <a class="logo" href="<?= yii\helpers\Url::toRoute(['site/index']); ?>"><img src="<?= Yii::$app->request->baseUrl . '/images/logo.png' ?>" alt="" /></a>
                        <a class="logo" href="<?= yii\helpers\Url::toRoute(['site/index']); ?>"><img src="<?= Yii::$app->request->baseUrl . '/images/make_in_india.jpg' ?>" alt="" /></a>
                        <button type="button" class="navbar-toggle menubtn-top collapsed" data-toggle="collapse" data-target="#menubox" aria-expanded="false">
                            <i class="fa fa-reorder"></i>
                        </button>
                        <?php
                        echo Menu::widget([
                            'items' => [
                                ['label' => 'Enquiry', 'url' => ['enquiry/create'], 'visible' => 'true'],
                                ['label' => 'Post a Kaizen', 'url' => ['kaizen/create'], 'visible' => 'true'],
                                ['label' => 'Entrepreneur Guide', 'url' => ['/entrepreneur'], 'visible' => 'true'],
                                ['label' => 'Signup', 'url' => ['site/signup'], 'visible' => Yii::$app->user->isGuest],
                                ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                                ['label' => 'Logout(' . $session->get('name') . ")", 'url' => ['site/logout'], 'visible' => !Yii::$app->user->isGuest, 'template' => '<a href="{url}" data-method="post">{label}</a>',],
                                ['label' => 'About Us', 'url' => ['#'], 'visible' => 'true'],
                                //['label' => 'Help', 'url' => ['#'], 'visible' => 'true'],
                            ],
                            'options' => [
                                'class' => 'admin-panel collapse navbar-collapse',
                                'id' => 'menubox'
                            ]
                        ]);
                        ?>
                    </div>
                </div>
                <!--  / headerBox \ -->
            </header>
            <!--  \ header container / -->
            <!--  / content container \ -->
            <section id="contentCntr" class="clearfix">
                <?= $content; ?> 
            </section>
            <?php if (Yii::$app->controller->id == "site" && Yii::$app->controller->action->id == "index"): ?>
                <?= $this->render('_layout_footer.php'); ?>
            <?php endif; ?>
            <!--  \ content container / -->
        </section>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
