<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\Billing */
?>
<div class="billing-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'month',
            'no_of_issue',
        ],
    ]) ?>

</div>
