<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\AgencyReceipt */
?>
<div class="agency-receipt-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'agency_id',
            'rcpt_date',
            'cr_amt',
            'payment_mode',
            'comment:ntext',
            'created_on',
            'created_on_time',
        ],
    ]) ?>

</div>
