<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\circulation\models\OrdinaryPostedDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ordinary Posted Datas';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="page-header">
        <h1>Ordinary Post</h1>
    </div>
</div>
<div class="ordinary-posted-data-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ordinary Posted Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'agency_id',
            'tempelate_id',
            'wt',
            'postage',
            // 'address_bar:ntext',
            // 'sn',
            // 'pjy',
            // 'org',
            // 'date',
            // 'ord_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
