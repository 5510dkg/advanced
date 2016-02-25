<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\OrdinaryPostData */
?>
<div class="ordinary-post-data-view">
 
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
