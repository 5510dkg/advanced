<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\Agency */

?>
<div class="agency-create">
    <?= $this->render('_form', [
        'model' => $model,
        //'rail'=>$rail,
        'q'=>$q,
        'data'=>$data,
        'acc'=>$acc,
    ]) ?>
</div>
