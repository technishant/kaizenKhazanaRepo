<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FairDetails */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fair Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content-header">
    <h1>
        <?= Html::encode(ucwords($this->title)) ?>
    </h1>

</section>
<section class="content">
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>
    <div class="row">
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php if (Yii::$app->session->hasFlash('successKz')) { ?>
                                <div class="alert alert-success">
                                    <?php echo Yii::$app->session->getFlash('successKz'); ?>
                                </div>
                                <?php
                            }
                            if (Yii::$app->session->hasFlash('errorKz')) {
                                ?>
                                <div class="alert alert-danger">
                                    <?php echo Yii::$app->session->getFlash('errorKz'); ?>
                                </div>
                            <?php } ?>
                                <?=
                                DetailView::widget([
                                    'model' => $model,
                                    'attributes' => [
                                        'id',
                                        'title',
                                        'description:html',
                                        [
                                            'attribute' => 'attachment',
                                            'format' => 'raw',
                                            'value'=> 'frontend/uploads/fairvideos/'.$model->attachment,
                                       ],
                                        'last_updated',
                                    ],
                                ])
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>