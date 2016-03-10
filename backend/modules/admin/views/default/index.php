<?php
$this->title='Home';
$this->registerJsFile('@web/bower_components/jquery/dist/jquery.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/bower_components/bootstrap/dist/js/bootstrap.min.js', ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);

?>
<div class="col-sm-4">
    <fieldset>
        <h1>   Welcome Mr. <?=Yii::$app->user->identity->name ?></h1>
    </fieldset>
</div>
