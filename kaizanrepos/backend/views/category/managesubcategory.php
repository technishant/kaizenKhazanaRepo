<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\web\Session;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Manage Sub Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h3>
        <?= Html::encode($this->title) . ' of ' . $currentModel->name; ?>
    </h3>

</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-9">
            <div class="box box-primary">
                <!-- /.box-header -->
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
                                            $url = Url::to(['category/updatecategorylevel2/' . $model['id'] . '?root=' . Yii::$app->session->get('rootId')]);
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
                                            'value' => function($model) {
                                        $id = $model['id'];
                                        $url = Url::to(['category/managelevel3category/' . $id]);
                                        return Html::a('Manage Level 3 Category', $url, ['title' => 'Go']);
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
                                    <?= Html::a(Yii::t('app', 'Create Level 2 Category '), ['createlevel2?root=' . Yii::$app->session->get('rootId')], ['class' => 'btn btn-success']) ?>
                                </p>
                            </div>
                        </div>
                    </div>                   
                </div>

            </div>
        </div>
        <!-- /.box -->

    </div>


</section>
<!-- /.content -->