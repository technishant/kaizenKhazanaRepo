<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\components\MyHelpers;

$this->title = 'Home :: Kaizen Khazana';
?>
<!--  / searchBox \ -->
<div class="searchBox clearfix" style='background-image: url("../../images/banners/<?= MyHelpers::randomizeBackgroundImage(); ?>")'>
    <div class="container height-100 pos-rel">
        <div class="row height-100">

            <div class="display-table height-100">
                <div class="display-table-cell">

                    <div class="search-section clearfix mar-btm-100">
                        <?php
                        $form = ActiveForm::begin([
                                    'action' => ['category-click'],
                                    'method' => 'get',
                        ]);
                        ?>
                        <div class="col-sm-10">   
                            <?php
                            echo Html::textInput('KaizenSearch[searchstring]', '', ['class' => 'form-control input-lg',
                                'placeholder' => 'Search Kaizen']);
                            ?>
                            <?= Html::hiddenInput('pg', 'kzsearch'); ?>
                            <?= Html::hiddenInput('type', 'all'); ?>
                        </div>
                        <div class="col-sm-2">                                
                            <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'width-full btn btn-primary btn-lg']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>

                    <div class="icon-section">
                        <div class="col-sm-2">
                            <div class="circle-box">
                                <span><i class="fa fa-apple"></i></span>
                                <span>Idea Bazaar</span>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="circle-box">
                                <span><i class="fa fa-apple"></i></span>
                                <span>Knowledge Bazaar</span>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="circle-box">
                                <span><i class="fa fa-apple"></i></span>
                                <span>E-Shopping</span>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="circle-box">
                                <span><i class="fa fa-apple"></i></span>
                                <span>Entrepreneur Guide</span>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="circle-box">
                                <span><i class="fa fa-apple"></i></span>
                                <span>Donate us</span>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="circle-box">
                                <span><i class="fa fa-apple"></i></span>
                                <span>Help</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  \ searchBox / -->

<!--/ featureBox \ -->
<div class = "featureBox text-center blue-bg clearfix">
    <div class = "container">
        <div class = "row">
            <h3 class = "font-strong">
                Popular Features that will change your life
                <small class = "font-regular">A single place where you can find new innovations, tools & information to grow your business</small>
            </h3>

            <ul class="icon-section clearfix moreList" id="myList">
                <?php foreach ($categories as $category): ?>
                    <li class="col-sm-3 col-5">
                        <a href="<?= Url::to(['category-click', 'id' => $category->id, 'type' => 'all']); ?>">
                            <div class = "item-border">
                                <span><i class="<?= $category->icon ?>"></i></span>
                                <span class="text-overflow"><?= Html::encode($category->name); ?></span>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <a href = "#" class = "btn btn-success btn-lg text-uppercase mar-top-30" id="loadMore">Explore more features</a>
        </div>
    </div>
</div>

<!--  / featureBox \ -->
<div class="featureBox text-center clearfix">
    <div class="container">
        <div class="row">

            <h3 class="font-strong">Over 50,000 Guides are available with us
                <small class="font-regular">Which can help you out with whats new a market.</small>
            </h3>

            <div class="icon-section clearfix">
                <div class="col-sm-4 col-xs-6">
                    <div class="item-border">
                        <span><i class="fa fa-apple"></i></span>
                        <span class="text-overflow">Idea Bazaar</span>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
                    <div class="item-border">
                        <span><i class="fa fa-apple"></i></span>
                        <span class="text-overflow">Idea Bazaar</span>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
                    <div class="item-border">
                        <span><i class="fa fa-apple"></i></span>
                        <span class="text-overflow">Idea Bazaar</span>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
                    <div class="item-border">
                        <span><i class="fa fa-apple"></i></span>
                        <span class="text-overflow">Idea Bazaar</span>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
                    <div class="item-border">
                        <span><i class="fa fa-apple"></i></span>
                        <span class="text-overflow">Idea Bazaar</span>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
                    <div class="item-border">
                        <span><i class="fa fa-apple"></i></span>
                        <span class="text-overflow">Idea Bazaar</span>
                    </div>
                </div>
            </div>

            <a href="#" class="btn btn-success btn-lg text-uppercase mar-top-30">Explore more guides</a>

        </div>
    </div>
</div>
<!--  \ featureBox / -->

<!--  / siderBox \ -->
<div class="siderBox clearfix">
    <div class="overlay"></div>
    <div class="owl-carousel slider-product">
        <?php if (!empty($fairVideos)): ?>
            <div class="item">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3><?= Html::encode('Fair'); ?></h3>
                            <p><?= Html::encode('Check our latest fair collection'); ?></p>
                        </div>
                        <?php foreach ($fairVideos as $fair): ?>
                            <div class="width-full-480 col-xs-3 col-md-3">
                                <div class="frames">
                                    <div class="overlay">
                                        <div class="display-table">
                                            <div class="display-table-cell">
                                                <h3><?= Html::encode(ucwords($fair->title)); ?></h3>
                                                <hr>
                                                <p><?= MyHelpers::trim_by_words($fair->description, 100); ?></p>
                                                <hr>
                                                <a href="<?= Url::toRoute('/fairdetails/watch?id=' . base64_encode($fair->id)); ?>" class="btn btn-primary">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if (file_exists(Yii::getAlias('@frontend') . '/web/uploads/fairvideos/' . pathinfo($fair->attachment, PATHINFO_FILENAME) . '.jpg')) {
                                        $imgpath = Yii::$app->request->baseUrl . '/uploads/fairvideos/' . pathinfo($fair->attachment, PATHINFO_FILENAME) . '.jpg';
                                    } else {
                                        $imgpath = Yii::$app->request->baseUrl . '/images/video-thumb-3.jpg';
                                    }
                                    ?>
                                    <img src="<?= $imgpath ?>" height="250px" width="500px">
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div align="center"><a href="<?php echo Url::toRoute('/fairdetails'); ?>" class="btn btn-success btn-lg text-uppercase mar-top-30">Explore more Fairs</a></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($capitalistModel)): ?>
            <div class="item">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3><?= Html::encode('Capitalist'); ?></h3>
                            <p><?= Html::encode('Check out our latest Capitalist'); ?></p>
                        </div>
                        <?php foreach ($capitalistModel as $capitalist): ?>
                            <div class="width-full-480 col-xs-3 col-md-3">
                                <div class="frames">
                                    <div class="overlay">
                                        <div class="display-table">
                                            <div class="display-table-cell">
                                                <h3><?= Html::encode(ucwords($capitalist->name)); ?></h3>
                                                <hr>
                                                <p><?= Html::encode($capitalist->short_description); ?></p>
                                                <hr>
                                                <a href="<?= Url::toRoute(['/site/capitalistDetails', 'id' => $capitalist->id]); ?>" class="btn btn-primary">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="<?= Yii::$app->request->baseUrl . '/uploads/capitalist_images/' . $capitalist->profile_photo ?>" height="250px" width="500px">
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div align="center"><a href="<?php echo Url::toRoute(''); ?>" class="btn btn-success btn-lg text-uppercase mar-top-30">Explore more Capitalist</a></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="item">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Process videos</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="width-full-480 col-xs-3 col-md-3">
                        <div class="frames">
                            <div class="overlay">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <h3>Sed ut perspiciatis unde </h3>
                                        <hr>
                                        <p>Omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                </div>
                            </div>
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-1.jpg' ?>" height="250px" width="500px">
                        </div>
                    </div>
                    <div class="width-full-480 col-xs-3 col-md-3">
                        <div class="frames">
                            <div class="overlay">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <h3>Sed ut perspiciatis unde </h3>
                                        <hr>
                                        <p>Omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                </div>
                            </div>
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-2.jpg' ?>" height="250px" width="500px">
                        </div>
                    </div>
                    <div class="width-full-480 col-xs-3 col-md-3">
                        <div class="frames">
                            <div class="overlay">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <h3>Sed ut perspiciatis unde </h3>
                                        <hr>
                                        <p>Omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                </div>
                            </div>
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-3.jpg' ?>" height="250px" width="500px">
                        </div>
                    </div>
                    <div class="width-full-480 col-xs-3 col-md-3">
                        <div class="frames">
                            <div class="overlay">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <h3>Sed ut perspiciatis unde </h3>
                                        <hr>
                                        <p>Omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                </div>
                            </div>
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-4.jpg' ?>" height="250px" width="500px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Whats new in market</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="width-full-480 col-xs-3 col-md-3">
                        <div class="frames">
                            <div class="overlay">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <h3>Sed ut perspiciatis unde </h3>
                                        <hr>
                                        <p>Omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                </div>
                            </div>
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-1.jpg' ?>" height="250px" width="500px">
                        </div>
                    </div>
                    <div class="width-full-480 col-xs-3 col-md-3">
                        <div class="frames">
                            <div class="overlay">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <h3>Sed ut perspiciatis unde </h3>
                                        <hr>
                                        <p>Omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                </div>
                            </div>
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-2.jpg' ?>" height="250px" width="500px">
                        </div>
                    </div>
                    <div class="width-full-480 col-xs-3 col-md-3">
                        <div class="frames">
                            <div class="overlay">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <h3>Sed ut perspiciatis unde </h3>
                                        <hr>
                                        <p>Omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                </div>
                            </div>
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-3.jpg' ?>" height="250px" width="500px">
                        </div>
                    </div>
                    <div class="width-full-480 col-xs-3 col-md-3">
                        <div class="frames">
                            <div class="overlay">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <h3>Sed ut perspiciatis unde </h3>
                                        <hr>
                                        <p>Omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                </div>
                            </div>
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-4.jpg' ?>" height="250px" width="500px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  \ siderBox / -->
<?php if (Yii::$app->user->isGuest): ?>
    <!--  / registerBox \ -->
    <div class="registerBox clearfix" style='background-image: url("../../images/banners/<?= MyHelpers::randomizeBackgroundImage(); ?>")'>
        <div class="container">
            <div class="row">
                <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['class' => 'register clearfix']]); ?>
                <div class="col-sm-12 clearfix">
                    <span class="text-center"><i class="fa fa-lock"></i><?= yii\bootstrap\Html::encode('Post a Kaizan and avail unlimited benefits. No credit card required') ?></span>
                    <hr>
                </div>
                <div class="col-sm-12 clearfix">
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($model, 'first_name', ['template' => "<div class='form-group'>\n{input}\n{error}</div>"])->label('')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'First Name']); ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($model, 'last_name', ['template' => "<div class='form-group'>\n{input}\n{error}</div>"])->label('')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Last Name']); ?> 
                        </div>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'email', ['template' => "<div class='form-group'>\n{input}\n{error}</div>"])->label('')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Email']); ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'phone', ['template' => "<div class='form-group'>\n{input}\n{error}</div>"])->label('')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Phone Number']); ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'password', ['template' => "<div class='form-group'>\n{input}\n{error}</div>"])->label('')->passwordInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Password']); ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'address', ['template' => "<div class='form-group'>\n{input}\n{error}</div>"])->label('')->textarea(['rows' => 4, 'cols' => 4, 'class' => 'form-control', 'placeholder' => 'Address']); ?>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> I have read and I agree to the Terms of Use and Privacy Policy
                        </label>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success btn-lg">Get Started</button>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <!--  \ registerBox / -->
<?php endif; ?>
