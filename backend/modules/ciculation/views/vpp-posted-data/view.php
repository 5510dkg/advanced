<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\VppPostedData */
?>
<div class="vpp-posted-data-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'agency_id',
            'tempelate_id',
            'wt',
            'postage',
            'address_bar:ntext',
            'sn',
            'pjy',
            'org',
            'date',
            'vpp_id',
            'license:ntext',
            'bundle_size',
            'state',
            'district',
            'postoffice',
            'state_id',
            'district_id',
            'post_office',
        ],
    ]) ?>

</div>
