<?php

use yii\widgets\Menu;
use frontend\models\Category;
use slatiusa\nestable\Nestable;
use kartik\sidenav\SideNav;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
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
                    //Pjax::begin(['id' => 'search-form']);
                    $form = ActiveForm::begin([
                                'action' => ['category-click'],
                                'method' => 'get',
                                'options' => ['data-pjax' => true]
                    ]);
                    ?>
                    <div class="search clearfix row mar-btm-20">
                        <div style="margin-bottom: 10px;">
                            <ul class="nav nav-pills nav-justified">
                                <li class=<?= ($_GET['type'] == "all") ? 'active' : ''?>><a href="<?= (isset($_GET['id'])) ? Url::to(['site/category-click', 'id' => $_GET['id'], 'type' => 'all']) : Url::to(['site/category-click', 'pg' => 'kzsearch', 'type' => 'all', 'KaizenSearch[searchstring]' => $_GET['KaizenSearch']['searchstring']]) ?>">All</a></li>
                                <li class=<?= ($_GET['type'] == "0") ? 'active' : ''?>><a href="<?= (isset($_GET['id'])) ? Url::to(['site/category-click', 'id' => $_GET['id'], 'type' => '0']) : Url::to(['site/category-click', 'pg' => 'kzsearch', 'type' => '0', 'KaizenSearch[searchstring]' => $_GET['KaizenSearch']['searchstring']]); ?>">Kaizen</a></li>
                                <li class=<?= ($_GET['type'] == "1") ? 'active' : ''?>><a href="<?= (isset($_GET['id'])) ? Url::to(['site/category-click', 'id' => $_GET['id'], 'type' => '1']) : Url::to(['site/category-click', 'pg' => 'kzsearch', 'type' => '1', 'KaizenSearch[searchstring]' => $_GET['KaizenSearch']['searchstring']]); ?>">Photos</a></li>
                                <li class=<?= ($_GET['type'] == "2") ? 'active' : ''?>><a href="<?= (isset($_GET['id'])) ? Url::to(['site/category-click', 'id' => $_GET['id'], 'type' => '2']) : Url::to(['site/category-click', 'pg' => 'kzsearch', 'type' => '2', 'KaizenSearch[searchstring]' => $_GET['KaizenSearch']['searchstring']]);?>">Videos</a></li>
                                <li class=<?= ($_GET['type'] == "3") ? 'active' : ''?>><a href="<?= (isset($_GET['id'])) ? Url::to(['site/category-click', 'id' => $_GET['id'], 'type' => '3']) : Url::to(['site/category-click', 'pg' => 'kzsearch', 'type' => '3', 'KaizenSearch[searchstring]' => $_GET['KaizenSearch']['searchstring']]); ?>">Books</a></li>
                            </ul>
                        </div>

                        <div class = "col-sm-10">
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
                        </div>
                        <?php
                        ActiveForm::end();
                        //yii\widgets\Pjax::end();
                        ?>
                    </div>
                    <div class = "list-section clearfix" id="pp">
                        <?php Pjax::begin(['enablePushState' => true, 'id' => 'gridData']); ?> 
                        <?=
                        ListView::widget([
                            'dataProvider' => $dataProvider,
                            'options' => [
                                'tag' => 'ul',
                                'class' => '',
                            ],
                            'layout' => '<div class="row">{items}</div>{pager}',
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
