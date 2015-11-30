<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\KaizenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Kaizens');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kaizen-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Kaizen'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'subject:ntext',
            'processarea:ntext',
            'category',
            'company',
            // 'currrentstage',
            // 'mode',
            // 'tangiblebenifits:ntext',
            // 'intengiblebenifits:ntext',
            // 'costsaving',
            // 'implementationdate',
            // 'postedby',
            // 'posteddate',
            // 'suggestedby',
            // 'approvedby',
            // 'recordstatus',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
