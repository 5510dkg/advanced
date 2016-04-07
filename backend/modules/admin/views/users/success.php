<?php
use yii\helpers\Html;
$this->title='Password Reset';

?>
<div class="col-lg-4 offset-4">
    <p class="text-success">Password has been reset successfully.</p>
    <?= Html::a('Return to List',['index'],['class'=>'btn btn-success btn-lg'])?>
</div>