<?php
$this->title='Billing Home';

?>
<?php
use yii\helpers\Html;

?> 
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Billing</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<?php  if(Yii::$app->user->can('generate-bill')){ ?>
<div class="col-lg-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Railway Labels
                        </div>
                        <div class="panel-body">
                        <?=Html::a('Generate Bill',['/circulation/billing'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        </div>
                        <div class="panel-footer">
                           Railway Labels
                        </div>
                    </div>
                </div> 
<?php } ?>
<?php  if(Yii::$app->user->can('upload-credit-note')){ ?>
<div class="col-lg-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Credit Note
                        </div>
                        <div class="panel-body">
                        <?=Html::a('Credit Note',['/circulation/agency-credit-note/list'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        </div>
                        <div class="panel-footer">
                           Credit Note
                        </div>
                    </div>
                </div> 
<?php } ?>

<?php  if(Yii::$app->user->can('upload-receipt')){ ?>
<div class="col-lg-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Receipt
                        </div>
                        <div class="panel-body">
                        <?=Html::a('Agency Receipts',['/circulation/agency-receipt/list'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        </div>
                        <div class="panel-footer">
                          Receipt
                        </div>
                    </div>
                </div> 
<?php } ?>
<?php  if(Yii::$app->user->can('search-bill')){ ?>
<div class="col-lg-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Receipt
                        </div>
                        <div class="panel-body">
                        <?=Html::a('Search Bill',['/circulation/billing/search'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        </div>
                        <div class="panel-footer">
                          Receipt
                        </div>
                    </div>
                </div> 
<?php } ?>