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
        if ($model->type == '0' && $model->attachmenttype == 'image' && file_exists(Yii::$app->params['kzAttachmentsUrl'] . '/thumb__' . $model->attachmentafter)) {
            $iconPath = Yii::$app->request->baseUrl . '/uploads/kzattachments/thumb__' . $model->attachmentafter;
        } elseif ($model->type == '0' && !file_exists(Yii::$app->params['kzAttachmentsUrl'] . '/thumb__' . $model->attachmentafter)) {
            switch ($model->attachmenttype) {
                case 'image':
                    $iconPath = Yii::$app->request->baseUrl . '/images/photoicon.png';
                    break;
                case 'pdf':
                    $iconPath = Yii::$app->request->baseUrl . '/images/pdficon.png';
                    break;
                case 'video':
                    $iconPath = Yii::$app->request->baseUrl . '/images/videoicon.png';
                    break;
                default:
                    $iconPath = Yii::$app->request->baseUrl . '/images/photoicon.png';
            }
            $imgpath = $iconPath;
        } else {
            $imgpath = Yii::$app->request->baseUrl . '/images/photoicon.jpg';
        }
        ?>
        <div class = "photo"><img src = "<?= $imgpath ?>"></div>
        <div class = "text">
            <a href="<?= Url::toRoute(['kaizen/view', 'id' => $model->id]); ?>"><h4><?= $model->name; ?></h4></a>
            <a href="<?= Url::toRoute(['kaizen/view', 'id' => $model->id]); ?>"><p><?= $model->subject; ?></p></a>
            <a href="<?= Url::toRoute(['kaizen/view', 'id' => $model->id]); ?>"><?= $model->description; ?></a>
        </div>
    </div>
</li>