<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Home :: Kaizen Khazana';
?>
<!--  / searchBox \ -->
<div class="searchBox clearfix">
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

            <div class = "icon-section clearfix">
                <?php foreach ($categories as $category): ?>
                    <div class = "col-sm-3 col-5">
                        <a href="<?= Url::to(['category-click', 'id' => $category->id]); ?>">
                            <div class = "item-border">
                                <span><i class = "fa fa-apple"></i></span>
                                <span class = "text-overflow"><?php echo $category->name; ?></span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <a href = "#" class = "btn btn-success btn-lg text-uppercase mar-top-30">Explore more features</a>
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
        <div class="item">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Fair</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="width-full-480 col-xs-6 col-md-6">
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
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-1.jpg' ?>">
                        </div>
                    </div>
                    <div class="width-full-480 col-xs-6 col-md-6">
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
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-2.jpg' ?>">
                        </div>
                    </div>
                    <div class="width-full-480 col-xs-6 col-md-6">
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
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-3.jpg' ?>">
                        </div>
                    </div>
                    <div class="width-full-480 col-xs-6 col-md-6">
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
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-4.jpg' ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Capitslist</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="width-full-480 col-xs-6 col-md-6">
                        <div class="frames">
                            <div class="overlay">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <h3>Sunil Bharti Mittal</h3>
                                        <hr>
                                        <p>Omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                </div>
                            </div>
                            <img src="<?= Yii::$app->request->baseUrl . '/images/cap1.jpg' ?>">
                        </div>
                    </div>
                    <div class="width-full-480 col-xs-6 col-md-6">
                        <div class="frames">
                            <div class="overlay">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <h3>Mukesh Ambani</h3>
                                        <hr>
                                        <p>Omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                </div>
                            </div>
                            <img src="<?= Yii::$app->request->baseUrl . '/images/cap2.jpg' ?>">
                        </div>
                    </div>
                    <div class="width-full-480 col-xs-6 col-md-6">
                        <div class="frames">
                            <div class="overlay">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <h3>Lakshmi Mittal</h3>
                                        <hr>
                                        <p>Omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                </div>
                            </div>
                            <img src="<?= Yii::$app->request->baseUrl . '/images/cap3.jpg' ?>">
                        </div>
                    </div>
                    <div class="width-full-480 col-xs-6 col-md-6">
                        <div class="frames">
                            <div class="overlay">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <h3>Indra Nooyi</h3>
                                        <hr>
                                        <p>Omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                </div>
                            </div>
                            <img src="<?= Yii::$app->request->baseUrl . '/images/cap4.jpg' ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Process videos</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="width-full-480 col-xs-6 col-md-6">
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
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-1.jpg' ?>">
                        </div>
                    </div>
                    <div class="width-full-480 col-xs-6 col-md-6">
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
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-2.jpg' ?>">
                        </div>
                    </div>
                    <div class="width-full-480 col-xs-6 col-md-6">
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
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-3.jpg' ?>">
                        </div>
                    </div>
                    <div class="width-full-480 col-xs-6 col-md-6">
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
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-4.jpg' ?>">
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
                    <div class="width-full-480 col-xs-6 col-md-6">
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
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-1.jpg' ?>">
                        </div>
                    </div>
                    <div class="width-full-480 col-xs-6 col-md-6">
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
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-2.jpg' ?>">
                        </div>
                    </div>
                    <div class="width-full-480 col-xs-6 col-md-6">
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
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-3.jpg' ?>">
                        </div>
                    </div>
                    <div class="width-full-480 col-xs-6 col-md-6">
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
                            <img src="<?= Yii::$app->request->baseUrl . '/images/video-thumb-4.jpg' ?>">
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
    <div class="registerBox clearfix">
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
