<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Kaizen */

$this->title = Yii::t('app', 'Create Kaizen');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kaizens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kaizen-create">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>

<!--/ footerBox \ -->
<footer class = "footerBox">
    <div class = "ul-center">
        <div class = "container">
            <div class = "row">
                <div class = "col-sm-12">
                    <ul>
                        <li><a href = "#" class = "color-white">Existing user ? Login to Kaizan Khanano</a></li>
                        <li><a href = "#">Terms of Use</a></li>
                        <li><a href = "#">Privacy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--\ footerBox / -->
