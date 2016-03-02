<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\circulation\models\AgencyBillBookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agency Bill Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agency-bill-book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Agency Bill Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'agency_id',
            'issue_date',
            'pjy',
            'org',
            // 'total_copies',
            // 'price_per_piece',
            // 'total_price',
            // 'discount',
            // 'discounted_amt',
            // 'final_total',
            // 'credit_amt',
            // 'credited_date',
            // 'pay_method',
            // 'issue_type',
            // 'previous_security_amt',
            // 'received_security_amt',
            // 'final_security_amt',
            // 'created_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
