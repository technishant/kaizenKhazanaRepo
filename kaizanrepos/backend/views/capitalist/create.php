<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Capitalist */

$this->title = 'Create Capitalist';
$this->params['breadcrumbs'][] = ['label' => 'Capitalists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content-header">
    <h1><?= Html::encode($this->title) ?></h1>
</section>
<section class="content">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>
</section>
