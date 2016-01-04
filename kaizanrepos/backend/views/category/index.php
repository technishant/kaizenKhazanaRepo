<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Manage Root Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h3>
        <?= Html::encode($this->title) ?>
    </h3>

</section>

<!-- Main content -->
<section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="row">
        <div class="col-md-9">
            <div class="box box-primary">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-9">
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
                            <div class="form-group">
                                <?php Pjax::begin(['id' => 'categorygridview']) ?>
                                <?=
                                GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    //'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],
                                        'name',
                                        ['class' => 'yii\grid\ActionColumn',
                                            'header' => 'Action',
                                            'template' => '{update} {delete}',
                                            'buttons' => [
                                                'update' => function ($url, $model) {
                                            $url = Url::to(['category/update/' . $model['id']]);
                                            return Html::a(
                                                            '<span class="glyphicon glyphicon-pencil"></span>', $url);
                                        },
                                                'link' => function ($url, $model, $key) {
                                            return Html::a('Action', $url);
                                        },
                                            ],
                                        ],
                                        [
                                            'label' => '',
                                            'format' => 'raw',
                                            'value' => function($data) {
                                        $url = Url::to(['category/managelevel2category/' . $data->id]);
                                        return Html::a('Manage Sub Category', $url, ['title' => 'Go']);
                                    }
                                        ],
                                    ],
                                ]);
                                ?>
                                <?php Pjax::end() ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p>
                                    <?= Html::a(Yii::t('app', 'Create Root Category'), ['create'], ['class' => 'btn btn-success']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                 
                </div>

            </div>
        </div>
    </div>
    <!-- /.box -->
</section>