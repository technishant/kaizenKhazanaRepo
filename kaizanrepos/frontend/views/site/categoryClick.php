<?php

use yii\widgets\Menu;
use frontend\models\Category;
use slatiusa\nestable\Nestable;
use kartik\sidenav\SideNav;
use yii\widgets\ListView;
?>
<!--  / filterBox \ -->
<div class="filterBox clearfix">
    <div class="container">
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

        <div class = "right-side">
            <div class = "tab-content">

                <div role = "tabpanel" class = "tab-pane active" id = "cars-vehecle">

                    <div class = "search clearfix row mar-btm-20">
                        <div class = "radio col-sm-3">
                            <label>
                                <input type = "radio" name = "optionsRadios" id = "optionsRadios1" value = "option1" checked> ALL
                            </label>
                        </div>
                        <div class = "radio col-sm-3">
                            <label>
                                <input type = "radio" name = "optionsRadios" id = "optionsRadios2" value = "option2"> Kaizan
                            </label>
                        </div>
                        <div class = "radio col-sm-3">
                            <label>
                                <input type = "radio" name = "optionsRadios" id = "optionsRadios3" value = "option3"> Videos
                            </label>
                        </div>
                        <div class = "radio col-sm-3">
                            <label>
                                <input type = "radio" name = "optionsRadios" id = "optionsRadios4" value = "option4"> Books
                            </label>
                        </div>
                        <div class = "col-sm-10">
                            <input type = "text" class = "form-control input-lg" placeholder = "Search Kaizen">
                        </div>
                        <div class = "col-sm-2">
                            <button type = "submit" class = "width-full btn btn-primary btn-lg">Search</button>
                        </div>
                    </div>
                    <div class = "list-section clearfix">
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
                                'firstPageLabel' => 'First',
                                'lastPageLabel' => 'Last',
                                'nextPageLabel' => 'Previous',
                                'prevPageLabel' => 'Next',
                                'maxButtonCount' => 3,
                            ],
                            'itemView' => '_kaizenList',
                        ]);
                        ?>
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
