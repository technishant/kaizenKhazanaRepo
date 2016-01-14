<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\KaizenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Fairs');
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="contentCntr" class="container">
    <!--  / product box \ -->
    <article class="productBox mar-top-30 mar-btm-30">
        <?php
        \yii\widgets\Pjax::begin();
        $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                    'options' => ['data-pjax' => true]
        ]);
        ?>
        <div class = "search clearfix row mar-btm-20">
            <div class = "col-sm-10">
                <?=
                $form->field($searchModel, 'searchstring')->widget(\yii\jui\AutoComplete::classname(), [
                    'clientOptions' => [
                    ],
                    'options' => [
                        'class' => 'form-control input-lg',
                        'placeholder' => 'Search Fairs'
                    ]
                ])->label(false);
                ?>

            </div>                        
            <div class = "col-sm-2">
                <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'width-full btn btn-primary btn-lg']) ?>
            </div>                        
        </div>
        <?php ActiveForm::end();
        ?>
        <?=
        ListView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '<div class="row">{items}</div><div class="row">{pager}</div>',
            'itemOptions' => [
                'tag' => false,
            ],
            'pager' => [
                'firstPageLabel' => '<',
                'lastPageLabel' => '>',
                'nextPageLabel' => '>>',
                'prevPageLabel' => '<<',
                'maxButtonCount' => 3,
            // Customzing options for pager container tag
            ],
            'itemView' => '_fairlist',
        ]);
        ?>
        <?php \yii\widgets\Pjax::end(); ?>
    </article>
    <!--  \ product box / -->
</section>
