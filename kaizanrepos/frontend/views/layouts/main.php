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

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
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

        <!--  / wrapper \ -->
        <section id="wrapper">

            <!--  / header container \ -->
            <header id="headerCntr">

                <!--  / headerBox \ -->
                <div class="headerBox">
                    <div class="container">

                        <a class="logo" href="<?= Yii::$app->urlManager->baseUrl; ?>"><img src="<?= Yii::$app->request->baseUrl . '/images/logo.png' ?>" alt="" /></a>
                        <?php
                        echo Menu::widget([
                            'items' => [
                                ['label' => 'Enquiry', 'url' => ['#'], 'visible' => 'true'],
                                ['label' => 'Post a Kaizen', 'url' => ['#'], 'visible' => 'true'],
                                ['label' => 'Signup', 'url' => ['site/signup'], 'visible' => Yii::$app->user->isGuest],
                                ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                                ['label' => 'Logout('.$_SESSION['name'].")", 'url' => ['site/logout'], 'visible' => !Yii::$app->user->isGuest, 'template' => '<a href="{url}" data-method="post">{label}</a>',],
                                ['label' => 'About Us', 'url' => ['#'], 'visible' => 'true'],
                                ['label' => 'Help', 'url' => ['#'], 'visible' => 'true'],
                            ],
                            'options' => [
                                'class' => 'admin-panel'
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

            <!--  \ content container / -->

        </section>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
