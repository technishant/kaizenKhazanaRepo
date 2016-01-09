<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FairDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Fair Details');
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= Html::encode($this->title) ?>
        <span class="pull-right">
            <?= Html::a(Yii::t('app', 'Add Fair'), ['create'], ['class' => 'btn btn-success']) ?>
        </span>
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
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
                                        'description:ntext',
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
