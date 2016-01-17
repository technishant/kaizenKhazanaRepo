<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use common\components\MyHelpers;
use yii\helpers\Html;
?>
    <div class="col-lg-3 col-md-4 col-sm-6 width-full-480">
        <div class="store-product"> 
            <div class="overlay text-center">
                <div class="center-v-box">
                    <div class="center-v-text">
                        <p><?= $model->title ?></p>
                        <p><?php echo MyHelpers::trim_by_words($model->description,20) ?></p>
                        <a href="<?= \yii\helpers\Url::toRoute('entrepreneur/watch?id='.base64_encode($model->id)); ?>" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>                 
            <?php
            if(file_exists(Yii::getAlias('@frontend').'/web/uploads/entrepreneur/thumb__'.pathinfo($model->attachment,PATHINFO_FILENAME).'.jpg') && $model->attachmenttype=='video'){
                $imgpath=  Yii::$app->request->baseUrl.'/uploads/entrepreneur/thumb__'.pathinfo($model->attachment,PATHINFO_FILENAME).'.jpg';
            }
            elseif(file_exists(Yii::getAlias('@frontend').'/web/uploads/entrepreneur/thumb__'.pathinfo($model->attachment,PATHINFO_BASENAME)) && $model->attachmenttype=='image'){
                $imgpath=  Yii::$app->request->baseUrl.'/uploads/entrepreneur/thumb__'.pathinfo($model->attachment,PATHINFO_BASENAME);
            }
            else{
                $imgpath=Yii::$app->request->baseUrl . '/images/item-1.jpg'; 
            } ?>
            <a href="#" class="pic">
                <img src="<?php echo $imgpath;?>" alt="">
            </a>
        </div>
    </div>
