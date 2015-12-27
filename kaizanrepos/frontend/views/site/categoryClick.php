<?php

use yii\widgets\Menu;
use frontend\models\Category;
use slatiusa\nestable\Nestable;
use kartik\sidenav\SideNav;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<!--  / filterBox \ -->
<div class="filterBox clearfix">
    <div class="container">
        <?php Pjax::begin(['id' => 'search-form']); ?>
        <?=
        SideNav::widget([
            'type' => SideNav::TYPE_PRIMARY,
            'heading' => 'Category',
            'items' => $menu,
            'encodeLabels' => FALSE,
            'containerOptions' => ['class' => 'left-side'],
            'indMenuOpen' => '<i class="fa fa-minus"></i>',
            'indMenuClose' => '<i class="fa fa-plus"></i>'
        ]);
        ?>
        <?php Pjax::end(); ?>
        <div class = "right-side">
            <div class = "tab-content">

                <div role = "tabpanel" class = "tab-pane active" id = "cars-vehecle">
                    <?php
                    Pjax::begin(['id' => 'search-form']);
                    $form = ActiveForm::begin([
                                'action' => ['category-click'],
                                'method' => 'get',
                                'options' => ['data-pjax' => true ]
                    ]);
                    ?>
                    <div class = "search clearfix row mar-btm-20">
                        <div class = "radio col-sm-2">
                            <label>
                                <input type = "radio" name = "optionsRadios" id = "optionsRadios1" value = "option1" checked> ALL
                            </label>
                        </div>
                        <div class = "radio col-sm-2">
                            <label>
                                <input type = "radio" name = "optionsRadios" id = "optionsRadios2" value = "option2"> Kaizen
                            </label>
                        </div>
                        <div class = "radio col-sm-2">
                            <label>
                                <input type = "radio" name = "optionsRadios" id = "optionsRadios5" value = "option4"> Photos
                            </label>
                        </div>
                        <div class = "radio col-sm-2">
                            <label>
                                <input type = "radio" name = "optionsRadios" id = "optionsRadios3" value = "option3"> Videos
                            </label>
                        </div>
                        <div class = "radio col-sm-2">
                            <label>
                                <input type = "radio" name = "optionsRadios" id = "optionsRadios4" value = "option4"> Books
                            </label>
                        </div>
                        <div class = "col-sm-10">
                            <?php // echo $form->field($searchmodel, 'searchstring')->textInput(['class' => 'form-control input-lg', 'placeholder' => 'Search Kaizen'])->label(false); ?>
                            <?=
                            $form->field($searchmodel, 'searchstring')->widget(\yii\jui\AutoComplete::classname(), [
                                'clientOptions' => [
                                    'source' => ['USA', 'RUS'],
                                ],
                                'options' => [
                                    'class' => 'form-control input-lg',
                                    'placeholder' => 'Search Kaizen'
                                ]
                            ])->label(false);
                            ?>
                        </div>                        
                            <?= Html::hiddenInput('pg', 'kzsearch'); ?>
                            <?= Html::hiddenInput('id', $id); ?>
                        <div class = "col-sm-2">
                        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'width-full btn btn-primary btn-lg']) ?>
                        <?php // echo Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'width-full btn btn-primary btn-lg'])  ?>

                        </div>
                        <?php ActiveForm::end(); 
                        yii\widgets\Pjax::end();
                        ?>
                    </div>
                    <div class = "list-section clearfix" id="pp">
                        <?php Pjax::begin(['enablePushState' => true,'id'=>'gridData']); ?> 
                        <?=
                        ListView::widget([
                            'dataProvider' => $dataProvider,
                            'options' => [
                                'tag' => 'ul',
                                'class' => '',
                            ],
                            'layout' => '{items}{pager}',
                            'itemOptions' => [
                                'tag' => false,
                            ],
                            'pager' => [
                                'firstPageLabel' => '<',
                                'lastPageLabel' => '>',
                                'nextPageLabel' => '>>',
                                'prevPageLabel' => '<<',
                                'maxButtonCount' => 3,
                            ],
                            'itemView' => '_kaizenList',
                        ]);
                        ?>
                        <?php Pjax::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--\ filterBox / -->

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
<!--  activate the anchor link on parent category -->
<?php $this->registerJS("jQuery(function($) {
        $('.kv-toggle').click(function(){
            location.href = this.href;
        });
});", $this::POS_END); ?>
<?php
 
$this->registerJs(
   '$("document").ready(function(){ 
        $("#search-form").on("pjax:end", function() {
            $.pjax.reload({container:"#gridData"});  //Reload GridView
        });
    });'
);
?>
