<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\AgencyReceipt */
$this->title='receipt add'
?>
<div class="agency-receipt-create">
    <?= $this->render('_form', [
        'model' => $model,
        'id'=>$id,
    ]) ?>
</div>
