<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\AgencyPayment */
?>
<div class="agency-payment-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'agency_id',
            'bill_number',
            'amount',
            'month',
            'balance',
            'payment_mode',
            'payment_detail:ntext',
            'comment:ntext',
        ],
    ]) ?>

</div>
