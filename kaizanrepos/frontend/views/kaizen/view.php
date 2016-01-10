<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\MyHelpers;
?>
<!--  / content container \ -->
<section id="contentCntr" class="clearfix">

    <!--  / formViewBox \ -->
    <div class="formViewBox clearfix" style='background-image: url("../../images/banners/<?= MyHelpers::randomizeBackgroundImage(); ?>")'>
        <div class="container">

            <h3><?= Html::encode($model->name); ?></h3>

            <div class="row first">
                <div class="col-sm-4"><?= Html::encode($model->company); ?></div>
                <div class="col-sm-2"><?= Html::encode($model->processarea); ?></div>
                <div class="col-sm-2">Result: Implemented</div>
                <div class="col-sm-2">Month of Report</div>
                <div class="col-sm-2">Aug'2013</div>
            </div>
            <div class="row first">
                <div class="col-sm-6"><?= Html::encode($model->subject); ?></div>
                <div class="col-sm-6"><?= Html::encode($model->processarea); ?></div>
            </div>
            <div class="row first">
                <div class="col-sm-4">Before</div>
                <div class="col-sm-4">After</div>
                <div class="col-sm-2">Productivity</div>
                <div class="col-sm-2">--</div>
            </div>
            <div class="row first">
                <div class="col-sm-4"><img src="assets/images/video-thumb-1.jpg"></div>
                <div class="col-sm-4"><img src="assets/images/video-thumb-2.jpg"></div>
                <div class="col-sm-4">
                    <div class="row second">
                        <div class="col-sm-6">Quality</div>
                        <div class="col-sm-6">--</div>
                    </div>
                    <div class="row second">
                        <div class="col-sm-6">Cost</div>
                        <div class="col-sm-6">--</div>
                    </div>
                    <div class="row second">
                        <div class="col-sm-6">Delivery</div>
                        <div class="col-sm-6">--</div>
                    </div>
                    <div class="row second">
                        <div class="col-sm-6">Safety</div>
                        <div class="col-sm-6">--</div>
                    </div>
                    <div class="row second last">
                        <div class="col-sm-6">Moral</div>
                        <div class="col-sm-6">--</div>
                    </div>
                </div>
            </div>
            <div class="row first">
                <div class="col-sm-4">Comments</div>
                <div class="col-sm-4">Comments</div>
                <div class="col-sm-4">
                    <div class="row second">
                        <div class="col-sm-6">Environment</div>
                        <div class="col-sm-6">--</div>
                    </div>
                    <div class="row second last">
                        <div class="col-sm-6">Others</div>
                        <div class="col-sm-6">--</div>
                    </div>
                </div>
            </div>
            <div class="row first">
                <div class="col-sm-4">Why-Why Analisis</div>
                <div class="col-sm-4">Horizontal Deployment</div>
                <div class="col-sm-2">Cost Saving/Year</div>
                <div class="col-sm-2"><?= Html::encode($model->costsaving); ?></div>
            </div>
            <div class="row first">
                <div class="col-sm-4">Reduce Energy</div>
                <div class="col-sm-4">Purchase, Training rooms</div>
                <div class="col-sm-2">Date of Implementation</div>
                <div class="col-sm-2"><?= Html::encode(date('d-M-Y', strtotime($model->posteddate))); ?></div>
            </div>
            <div class="row first">
                <div class="col-sm-8">Benefits</div>
                <div class="col-sm-2">Suggested By</div>
                <div class="col-sm-2"><?= Html::encode($model->suggestedby); ?></div>
            </div>
            <div class="row first">
                <div class="col-sm-8">Saving</div>
                <div class="col-sm-2">Approved By</div>
                <div class="col-sm-2"><?= Html::encode($model->approvedby); ?></div>
            </div>
        </div>
    </div>
    <!--  \ formViewBox / -->

</section>
<!--  \ content container / -->

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