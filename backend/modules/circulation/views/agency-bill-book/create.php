<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\AgencyBillBook */

$this->title = 'Create Agency Bill Book';
$this->params['breadcrumbs'][] = ['label' => 'Agency Bill Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agency-bill-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
