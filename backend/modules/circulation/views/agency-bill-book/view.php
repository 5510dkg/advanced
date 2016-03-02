<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\AgencyBillBook */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Agency Bill Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agency-bill-book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
