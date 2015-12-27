<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Url;
?>
<li>
    <div class = "inner border-none clearfix">
         <?php 
         if(file_exists(Yii::$app->params['kzAttachmentsUrl'].'/thumb__'.$model->attachmentbefore)){
            $imgpath=Yii::$app->request->baseUrl . '/uploads/kzattachments/thumb__'.$model->attachmentbefore;
        }
        else{
           $imgpath=Yii::$app->request->baseUrl . '/images/item-1.jpg'; 
        } ?>
        <div class = "photo"><img src = "<?= $imgpath ?>"></div>
        <div class = "text">
            <a href="<?= Url::toRoute(['kaizen/view', 'id' => $model->id]); ?>"><h4><?= $model->name; ?></h4></a>
            <a href="<?= Url::toRoute(['kaizen/view', 'id' => $model->id]); ?>"><p><?= $model->subject; ?></p></a>
            <a href="<?= Url::toRoute(['kaizen/view', 'id' => $model->id]); ?>"><?= $model->description; ?></a>
        </div>
    </div>
</li>