<?php
$this->title='Home';
$this->registerJsFile('@web/bower_components/jquery/dist/jquery.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/bower_components/bootstrap/dist/js/bootstrap.min.js', ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);

?>
<?php
use yii\helpers\Html;

?> 
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Labels Management</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<?php  if(Yii::$app->user->can('generate-labels')){ ?>
<div class="col-lg-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Railway Labels
                        </div>
                        <div class="panel-body">
                        <?=Html::a('Railway Labels',['/circulation/railway-post-data'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        </div>
                        <div class="panel-footer">
                           Railway Labels
                        </div>
                    </div>
                </div> 
<?php } ?>
<?php  if(Yii::$app->user->can('generate-labels')){ ?>
<div class="col-lg-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Ordinary Post Labels
                        </div>
                        <div class="panel-body">
                        <?=Html::a('Ordinary Post Labels',['/circulation/ordinary-post-data'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        </div>
                        <div class="panel-footer">
                           Ordinary Post Labels
                        </div>
                    </div>
                </div> 
<?php } ?>
<?php  if(Yii::$app->user->can('generate-labels')){ ?>
<div class="col-lg-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Registered Post Labels
                        </div>
                        <div class="panel-body">
                        <?=Html::a('Registered Post Labels',['/circulation/registered-post-data'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        </div>
                        <div class="panel-footer">
                           Registered Post Labels
                        </div>
                    </div>
                </div> 
<?php } ?>