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

            <h3><?= Html::encode(ucwords($model->name)); ?></h3>
            <?php
            switch ($model->type) {
                case '1':
                    if (file_exists(Yii::$app->params['kzAttachmentsUrl'] . '/' . $model->attachmentother)) {
                        $imgpath = Yii::$app->request->baseUrl . '/uploads/kzattachments/' . $model->attachmentother;
                    } else {
                        $imgpath = Yii::$app->request->baseUrl . '/images/photoicon.png';
                    }
                    ?>
                    <div class="row">
                        <div class="col-sm-6"><img src="<?= $imgpath; ?>"></div>
                        <div class="col-sm-6">
                            <div class="row second">
                                <div class="col-sm-6"><?= $model->getAttributeLabel('name') ?></div>
                                <div class="col-sm-6"><?= MyHelpers::WebTextCaps($model->name); ?></div>
                            </div>
                            <div class="row second">
                                <div class="col-sm-6"><?= $model->getAttributeLabel('subject') ?></div>
                                <div class="col-sm-6"><?= MyHelpers::WebTextCaps($model->subject); ?></div>
                            </div>
                            <?php if (!empty($model->description)) { ?>
                                <div class="row second">
                                    <div class="col-sm-6"><?= $model->getAttributeLabel('description') ?></div>
                                    <div class="col-sm-6"><?= MyHelpers::WebText($model->description); ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                    break;
                case '2':
                    if (!empty($model->attachmentother) && file_exists(Yii::$app->params['kzAttachmentsUrl'] . '/' . $model->attachmentother)) {
                        $vidpath1 = Yii::$app->request->baseUrl . '/uploads/kzattachments/' . $model->attachmentother;
                    } else {
                        $vidpath1 = '';
                    }
                    ?>
                    <div class="row">
                    <?php if (!empty($vidpath1)) { ?>
                            <div class="col-sm-6">
                                <video class="player" style="width: 100%; height: 350px; background: black;" controls>
                                    <source src="<?= $vidpath1 ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
        <?php } ?>
                        <div class="col-sm-6">
                            <div class="row second">
                                <div class="col-sm-6"><?= $model->getAttributeLabel('name') ?></div>
                                <div class="col-sm-6"><?= MyHelpers::WebTextCaps($model->name); ?></div>
                            </div>
                            <div class="row second">
                                <div class="col-sm-6"><?= $model->getAttributeLabel('subject') ?></div>
                                <div class="col-sm-6"><?= MyHelpers::WebTextCaps($model->subject); ?></div>
                            </div>
        <?php if (!empty($model->description)) { ?>
                                <div class="row second">
                                    <div class="col-sm-6"><?= $model->getAttributeLabel('description') ?></div>
                                    <div class="col-sm-6"><?= MyHelpers::WebText($model->description); ?></div>
                                </div>
        <?php } ?>
                        </div>
                    </div>
                            <?php
                            break;
                        case '3':
                            if (file_exists(Yii::$app->params['kzAttachmentsUrl'] . '/' . $model->attachmentother)) {
                                $imgpath = Yii::$app->request->baseUrl . '/uploads/kzattachments/' . $model->attachmentother;
                            } else {
                                $imgpath = '';
                            }
                            ?>
                    <div class="row">
                    <?php if (!empty($imgpath)) { ?>
                            <div class="col-sm-1"><a href="<?= $imgpath; ?>"><img src="<?= Yii::$app->request->baseUrl . '/images/pdficon.png'; ?>"></a></div>
                    <?php } ?>
                        <div class="col-sm-11">
                            <div class="row second">
                                <div class="col-sm-2"><?= $model->getAttributeLabel('name') ?></div>
                                <div class="col-sm-4"><?= MyHelpers::WebTextCaps($model->name); ?></div>

                                <div class="col-sm-2"><?= $model->getAttributeLabel('subject') ?></div>
                                <div class="col-sm-4"><?= MyHelpers::WebTextCaps($model->subject); ?></div>
                            </div>    
        <?php if (!empty($model->description)) { ?>
                                <div class="row second">
                                    <div class="col-sm-2"><?= $model->getAttributeLabel('description') ?></div>
                                    <div class="col-sm-10"><?= MyHelpers::WebText($model->description); ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
        <?php
        break;
    default:
        if (!empty($model->attachmentbefore) && file_exists(Yii::$app->params['kzAttachmentsUrl'] . '/' . $model->attachmentbefore)) {
            $vidpath1 = Yii::$app->request->baseUrl . '/uploads/kzattachments/' . $model->attachmentbefore;
        } else {
            $vidpath1 = '';
        }
        if (!empty($model->attachmentafter) && file_exists(Yii::$app->params['kzAttachmentsUrl'] . '/' . $model->attachmentafter)) {
            $vidpath2 = Yii::$app->request->baseUrl . '/uploads/kzattachments/' . $model->attachmentafter;
        } else {
            $vidpath2 = '';
        }
        ?>
                    <div class="row first">                
                        <div class="col-sm-2"><?= $model->getAttributeLabel('processarea'); ?></div>
                        <div class="col-sm-2"><?= MyHelpers::WebTextCaps($model->processarea); ?></div>
                    </div>
                    <?php if (!empty($model->implemented_by) || !empty($model->company)) { ?>
                        <div class="row first">
                        <?php if (!empty($model->implemented_by)) { ?>
                                <div class="col-sm-2"><?= $model->getAttributeLabel('implemented_by'); ?></div>
                                <div class="col-sm-2"><?= MyHelpers::WebTextCaps($model->implemented_by); ?></div>
            <?php }
            if (!empty($model->company)) {
                ?>                
                                <div class="col-sm-2"><?= $model->getAttributeLabel('company'); ?></div>
                                <div class="col-sm-2"><?= MyHelpers::WebTextCaps($model->company); ?></div>
                            <?php } ?>
                        </div>
        <?php } ?>     
                    <div class="row first">
                        <div class="col-sm-2"><?= $model->getAttributeLabel('problem_observed'); ?></div>
                        <div class="col-sm-4"><?= MyHelpers::WebTextFirstCap($model->problem_observed); ?></div>
                        <div class="col-sm-2"><?= $model->getAttributeLabel('action_taken'); ?></div>
                        <div class="col-sm-4"><?= MyHelpers::WebTextFirstCap($model->action_taken); ?></div>
                    </div>
                    <div class="row first">
                    <?php if (!empty($vidpath1)) { ?>
                            <div class="col-sm-6">
                                <h4>Before Kaizen</h4>
                                <video class="player" style="width: 100%; height: 350px; background: black;" controls>
                                    <source src="<?= $vidpath1 ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        <?php } ?>
        <?php if (!empty($vidpath2)) { ?>
                            <div class="col-sm-6">
                                <h4>After Kaizen</h4>
                                <video class="player" style="width: 100%; height: 350px; background: black;" controls>
                                    <source src="<?= $vidpath2 ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        <?php } ?>


                    </div>
                    <div class="row first">
                        <div class="col-sm-2"><?= $model->getAttributeLabel('tangiblebenifits'); ?></div>
                        <div class="col-sm-4"><?= MyHelpers::WebTextFirstCap($model->tangiblebenifits); ?></div>
                        <div class="col-sm-2"><?= $model->getAttributeLabel('intengiblebenifits'); ?></div>
                        <div class="col-sm-4"><?= MyHelpers::WebTextFirstCap($model->intengiblebenifits); ?></div>
                    </div>

    <?php
}
?>
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