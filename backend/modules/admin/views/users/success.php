<?php
use yii\helpers\Html;
$this->title='Password Reset';

?>
<div class="row">
    <div class="page-header">
        <h1> Password Reset </h1>
    </div>
</div>
<div class="col-lg-4 offset-4">
    <p class="text-success">Password has been reset successfully.</p>
    <?= Html::a('Return to List',['index'],['class'=>'btn btn-success btn-lg'])?>
</div>