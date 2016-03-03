<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\AgencyCreditNote */
?>
<div class="agency-credit-note-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'agency_id',
            'return_date',
            'issue_type',
            'pjy',
            'org',
            'issue_date',
            'return_type',
        ],
    ]) ?>

</div>
