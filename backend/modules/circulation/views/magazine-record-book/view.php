<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\MagazineRecordBook */
?>
<div class="magazine-record-book-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date',
            'issue_type',
        ],
    ]) ?>

</div>
