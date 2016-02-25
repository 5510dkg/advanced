<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\BundleSize */
?>
<div class="bundle-size-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'delivery_method',
            'size',
        ],
    ]) ?>

</div>
