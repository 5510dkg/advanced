<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\RegisteredPost */
?>
<div class="registered-post-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'top_tempelate:ntext',
            'wt',
            'postage',
            'tagline:ntext',
            'sn_tag',
            'pjy_name',
            'org_name',
        ],
    ]) ?>

</div>
