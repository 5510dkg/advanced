<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\Billing */
?>
<div class="row">
    <div class="page-header">
        <h1>Billing Detail</h1>
    </div>
</div>
<div class="billing-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'agency.name',
            'agency.account_id',
        ],
    ]) ?>

</div>
