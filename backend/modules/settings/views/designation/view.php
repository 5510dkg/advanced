<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\Designation */
?>
<div class="designation-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'department_id',
                'value' => $model->department->name
            ],
            'designation_name',
        ],
    ]) ?>

</div>
