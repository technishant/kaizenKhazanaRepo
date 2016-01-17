<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EntrepreneurSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Entrepreneurs');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content-header">
    <h1>
        <?= Html::encode($this->title) ?>
        <span class="pull-right">
            <?= Html::a(Yii::t('app', 'Add Entrepreneurs'), ['create'], ['class' => 'btn btn-success']) ?>
        </span>
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
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
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?=
                                GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],
                                        'title',
                                        'description:html',
                                        'last_updated',
                                        ['class' => 'yii\grid\ActionColumn'],
                                    ],
                                ]);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
