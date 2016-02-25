<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\RegisteredPostData */
?>
<div class="registered-post-data-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date',
            'time',
        ],
    ]) ?>

</div>
