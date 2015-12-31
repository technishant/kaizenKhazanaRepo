<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Enquiry */

$this->title = 'Create Enquiry';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enquiry-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
