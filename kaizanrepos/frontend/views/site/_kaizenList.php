<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<li>
    <div class = "inner border-none clearfix">
        <div class = "photo"><img src = "<?= Yii::$app->request->baseUrl . '/images/item-1.jpg' ?>"></div>
        <div class = "text">
            <h4><?= $model->name; ?></h4>
            <p><?= $model->subject; ?></p>
            <a href = "#"><?= $model->description; ?></a>
        </div>
    </div>
</li>