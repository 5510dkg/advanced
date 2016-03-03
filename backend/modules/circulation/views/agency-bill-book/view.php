<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\AgencyBillBook */
?>
<div class="agency-bill-book-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'agency_id',
            'issue_date',
            'pjy',
            'org',
            'total_copies',
            'price_per_piece',
            'total_price',
            'discount',
            'discounted_amt',
            'final_total',
            'credit_amt',
            'credited_date',
            'pay_method',
            'issue_type',
            'previous_security_amt',
            'received_security_amt',
            'final_security_amt',
            'created_on',
        ],
    ]) ?>

</div>
