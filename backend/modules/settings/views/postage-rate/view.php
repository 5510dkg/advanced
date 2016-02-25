<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\PostageRate */
?>
<div class="postage-rate-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'rate',
        ],
    ]) ?>

</div>
