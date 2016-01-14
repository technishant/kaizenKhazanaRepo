<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use common\components\MyHelpers;
use yii\helpers\ArrayHelper;
use yii\web\View;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\KaizenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Fairs');
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="contentCntr" class="container">
    <!--  / product box \ -->
    <article class="productBox mar-top-30 mar-btm-30">
        
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 width-full-480">
            
                <?php
                    $form = ActiveForm::begin([
                                'action' => ['/site/category-click'],
                                'method' => 'get',
                    ]);
                    ?>
<!--                    <div class = "search clearfix row mar-btm-20">
                        
                        <div class = "col-sm-10">
                            
                            <?=  $form->field($searchModel, 'searchstring')->widget(\yii\jui\AutoComplete::classname(), [
                                'clientOptions' => [
                                    //'source' => ['USA', 'RUS'],
                                ],
                                'options' => [
                                    'class' => 'form-control input-lg',
                                    'placeholder' => 'Search Process Videos'
                                ]
                            ])->label(false);  ?>
                            
                        </div>                        
                        <div class = "col-sm-2">
                        <input type="hidden" name="pg" value="kzsearch">
                        <input type="hidden" name="type" value="2">
                        <input type="hidden" name="pgvideos" value="<?= $currentVideo->id; ?>">
                        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'width-full btn btn-primary btn-lg']) ?>
                        </div>                        
                    </div>-->
                <?php ActiveForm::end(); ?>
                
                <div class="store-product"> 
                    <video class="player" style="width: 100%; height: 450px; background: black;" controls>
                        <source src="<?= Yii::$app->request->baseUrl . '/uploads/kzattachments/' . $currentVideo->attachmentother; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>  
                <p><div class="fb-like" data-href="<?= Yii::$app->request->url; ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="false"></div></p>
                <h2><?= MyHelpers::WebTextCaps($currentVideo->name); ?></h2>    
                <h4><?= MyHelpers::WebTextCaps($currentVideo->subject); ?></h4>    
                <p><?= MyHelpers::WebTextFirstCap($currentVideo->description); ?></p>

            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 width-full-480">
                <?php \yii\widgets\Pjax::begin(['id' => 'list-data']); ?> 
                <?=
                ListView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => '{items}{pager}',
                    'itemOptions' => [
                        'tag' => false,
                    ],
                    'options' => [
                        'tag' => 'ul',
                        'class' => '',
                    ],
                    'pager' => [
                        'firstPageLabel' => '<',
                        'lastPageLabel' => '>',
                        'nextPageLabel' => '>>',
                        'prevPageLabel' => '<<',
                        'maxButtonCount' => 3,
                    // Customzing options for pager container tag
                    ],
                    'itemView' => '_watchlist',
                ]);
                ?>
                <?php \yii\widgets\Pjax::end(); ?>   

            </div>
        </div>


    </article>
</section>
<!--  \ product box / -->