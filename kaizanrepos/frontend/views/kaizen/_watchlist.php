<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use common\components\MyHelpers;
use yii\helpers\Html;
?>
        <div class="store-product"> 
            <div class="overlay text-center">
                <div class="center-v-box">
                    <div class="center-v-text">
                        <p><?= Html::encode(ucwords($model->name)) ?></p>
                        <p><?php echo ucfirst(MyHelpers::trim_by_words($model->subject,10,true)) ?></p>
                        <a data-pjax="0" href="<?= \yii\helpers\Url::toRoute('/kaizen/watchprocess?id='.base64_encode($model->id)); ?>" id="playthis" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>                 
            <?php
            if(file_exists(Yii::$app->params['kzAttachmentsUrl'] . '/thumb__' . pathinfo($model->attachmentother, PATHINFO_FILENAME) . '.jpg')){
                $imgpath = Yii::$app->request->baseUrl . '/uploads/kzattachments/thumb__' . pathinfo($model->attachmentother, PATHINFO_FILENAME) . '.jpg';
            }else{
                $imgpath=Yii::$app->request->baseUrl . '/images/item-1.jpg'; 
            } ?>
            <a href="" class="pic">
                <img class="processVideoWatch" src="<?php echo $imgpath;?>" alt="">
            </a>
        </div>
    
