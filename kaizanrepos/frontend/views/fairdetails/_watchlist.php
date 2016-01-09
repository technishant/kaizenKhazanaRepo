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
                        <p><?= Html::encode(ucwords($model->title)) ?></p>
                        <p><?php echo ucfirst(MyHelpers::trim_by_words($model->description,10)) ?></p>
                        <a data-pjax="0" href="<?= \yii\helpers\Url::toRoute('fairdetails/watch?id='.base64_encode($model->id)); ?>" id="playthis" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>                 
            <?php
            if(file_exists(Yii::getAlias('@frontend').'/web/uploads/fairvideos/'.pathinfo($model->attachment,PATHINFO_FILENAME).'.jpg')){
                $imgpath=  Yii::$app->request->baseUrl.'/uploads/fairvideos/'.pathinfo($model->attachment,PATHINFO_FILENAME).'.jpg';
            }else{
                $imgpath=Yii::$app->request->baseUrl . '/images/item-1.jpg'; 
            } ?>
            <a href="" class="pic">
                <img src="<?php echo $imgpath;?>" alt="">
            </a>
        </div>
    
