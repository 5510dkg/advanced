<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\Users */
?>
<div class="users-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email:email',
            'name',
            [
                'attribute' => 'department_id',
                'value' => $model->department->name
            ],
            [
                'attribute' => 'role_group_id',
                'value' => $model->roleGroup->name
            ],
            [
                'attribute'=>'status',
                'value'=>$model->status == 10 ? 'Active' : 'Blocked'
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
