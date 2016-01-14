<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Url;
use yii\bootstrap\Html;
use common\components\MyHelpers;
?>
<div class="col-sm-6">
    <li class="row">
        <div class="inner border-none clearfix">
            <?php
            if ($model->type == '1' && file_exists(Yii::$app->params['kzAttachmentsUrl'] . '/thumb__' . $model->attachmentother)) {
                $imgpath = Yii::$app->request->baseUrl . '/uploads/kzattachments/thumb__' . $model->attachmentother;
            } elseif ($model->type == '2' && file_exists(Yii::$app->params['kzAttachmentsUrl'] . '/thumb__' . pathinfo($model->attachmentother, PATHINFO_FILENAME) . '.jpg')) {
                $imgpath = Yii::$app->request->baseUrl . '/uploads/kzattachments/thumb__' . pathinfo($model->attachmentother, PATHINFO_FILENAME) . '.jpg';
            } elseif ($model->type == '0' && $model->attachmenttype == 'image' && file_exists(Yii::$app->params['kzAttachmentsUrl'] . '/thumb__' . $model->attachmentafter)) {
                $imgpath = Yii::$app->request->baseUrl . '/uploads/kzattachments/thumb__' . $model->attachmentafter;
            } elseif ($model->type == '0' && $model->attachmenttype == 'video' && file_exists(Yii::$app->params['kzAttachmentsUrl'] . '/thumb__' . pathinfo($model->attachmentafter, PATHINFO_FILENAME) . '.jpg')) {
                $imgpath = Yii::$app->request->baseUrl . '/uploads/kzattachments/thumb__' . pathinfo($model->attachmentafter, PATHINFO_FILENAME) . '.jpg';
            } else {
                switch ($model->attachmenttype) {
                    case 'image':
                        $imgpath = Yii::$app->request->baseUrl . '/images/photoicon.png';
                        break;
                    case 'pdf':
                        $imgpath = Yii::$app->request->baseUrl . '/images/pdficon.png';
                        break;
                    case 'video':
                        $imgpath = Yii::$app->request->baseUrl . '/images/videoicon.png';
                        break;
                    default:
                        $imgpath = Yii::$app->request->baseUrl . '/images/photoicon.png';
                }
            }
            ?>
            <div class = "photo"><img src = "<?= $imgpath ?>"></div>
            <div class = "text">
                <a href="<?= Url::toRoute(['kaizen/view', 'id' => $model->id]); ?>"><h4><?= Html::encode(ucwords($model->name)); ?></h4></a>
                <a href="<?= Url::toRoute(['kaizen/view', 'id' => $model->id]); ?>"><p><?= Html::encode(ucwords($model->processarea)); ?></p></a>
                <a href="<?= Url::toRoute(['kaizen/view', 'id' => $model->id]); ?>"><?= Html::encode(ucwords($model->implemented_by)) . " at " . Html::encode(ucwords($model->company)); ?></a>
            </div>
        </div>
    </li>
</div>