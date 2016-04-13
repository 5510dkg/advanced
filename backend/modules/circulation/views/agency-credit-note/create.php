<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\AgencyCreditNote */

?>
<div class="agency-credit-note-create">
    <?= $this->render('_form', [
        'model' => $model,
        'id'=>$id,
        'billing_id'=>$billing_id
    ]) ?>
</div>
