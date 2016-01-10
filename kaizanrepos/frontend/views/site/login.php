<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\components\MyHelpers;
$this->title = 'Login';
?>

<!--  / loginBox \ -->
<div class="loginBox clearfix" style='background-image: url("../../web/images/banners/<?= MyHelpers::randomizeBackgroundImage(); ?>")'>
    <div class="container">
        <div class="row">
            <?php $form = ActiveForm::begin(['id' => 'login-form', 'method' => 'POST', 'options' => ['class' => 'login clearfix']]); ?>
            <a href="<?= Url::to('signup'); ?>" class="btn btn-default top-button">Register now</a>
            <div class="col-sm-6">
                <h4>Enjoy the benefits of Registration:</h4>
                <ul>
                    <li>Aenean tempus ligula et dui aliquet, ut commodo.</li>
                    <li>Duis ornare velit et erat laoreet, libero lobortis.</li>
                    <li>Nam dictum ligula et risus aliquet pharetra.</li>
                    <li>Aenean imperdiet magna in dolor mollis, ut fringilla ante vehicula.</li>
                    <li>Mauris sit amet felis sed metus fermentum iaculis.</li>
                </ul>
            </div>
            <div class="col-sm-6">
                <span class="text-center"><i class="fa fa-lock"></i> Log In</span>
                <hr>

                <div class="form-group">
                    <?= $form->field($model, 'email', ['template' => "<div class='form-group'>\n{input}\n{error}</div>"])->label('')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'someone@example.com']); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'password', ['template' => "<div class='form-group'>\n{input}\n{error}</div>"])->label('')->passwordInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => '******************']); ?>
                </div>
                <div class="form-group clearfix">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="checkbox">
                                <label><input class="checkbox-inline" type="checkbox"> Keep me loged in</label>
                            </div>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="checkbox">
                                <a href="#">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-lg']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            </form>
        </div>
    </div>
</div>
<!--  \ loginBox / -->

<!--  / footerBox \ -->
<footer class="footerBox">
    <div class="ul-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul>
                        <li><a href="#" class="color-white">Existing user ? Login to Kaizan Khanano</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--  \ footerBox / -->