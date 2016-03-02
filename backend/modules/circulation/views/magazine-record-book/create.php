<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\MagazineRecordBook */

$this->title = 'Create Magazine Record Book';
$this->params['breadcrumbs'][] = ['label' => 'Magazine Record Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="magazine-record-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
