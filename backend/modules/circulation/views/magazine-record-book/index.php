<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\circulation\models\MagazineRecordBookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Magazine Record Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="magazine-record-book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Magazine Record Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            'issue_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
