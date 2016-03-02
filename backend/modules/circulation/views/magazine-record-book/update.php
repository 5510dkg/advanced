<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\MagazineRecordBook */

$this->title = 'Update Magazine Record Book: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Magazine Record Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="magazine-record-book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
