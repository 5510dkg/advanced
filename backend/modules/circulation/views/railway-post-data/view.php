<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\RailwayPostData */
?>
<div class="railway-post-data-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date',
            'time',
            'generated_date',
        ],
    ]) ?>

</div>
