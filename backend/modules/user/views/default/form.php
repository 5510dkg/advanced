<?php
$this->title='Home';

?>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?> 
<div class=" box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Label Generation</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">

        <div class="row">
            <div class="col-md-12">    
                <?php $form= ActiveForm::begin()?>
                <table class="table-bordered table-responsive table-condensed" style="width: 100%;">
                    <tr>
                    
                    <th>
                        Name
                    </th>
                    <th>
                        Sort By
                    </th>
                    </tr>
                    <tr>
                        <td>
                            <?=$form->field($model, 'railway')->checkbox(array( 
                                            //'label'=>'railway', 
                                            'labelOptions'=>array('style'=>'padding:5px;'), 
                                            'disabled'=>false 
                                            )) 
?>
                        </td>
                        <td>
                            <?=$form->field($model, 'rail_sort_by')->dropDownList(['state'=>'state',
                                'train'=>'train','Organiser_only'=>'organiser Only','panchjanya_only'=>'Panchjanya Only'])->label(false);?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?=$form->field($model, 'ordinary')->checkbox(array( 
                                            //'label'=>'railway', 
                                            'labelOptions'=>array('style'=>'padding:5px;'), 
                                            'disabled'=>false 
                                            )) 
?>
                        </td>
                        <td>
                            <?=$form->field($model, 'ord_sort_by')->dropDownList(['state'=>'state',
                                'Organiser_only'=>'organiser Only','panchjanya_only'=>'Panchjanya Only'])->label(false);?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?=$form->field($model, 'registered')->checkbox(array( 
                                            //'label'=>'railway', 
                                            'labelOptions'=>array('style'=>'padding:5px;'), 
                                            'disabled'=>false 
                                            )) 
?>
                        </td>
                        <td>
                            <?=$form->field($model, 'regd_sort_by')->dropDownList(['state'=>'state',
                                'Organiser_only'=>'organiser Only','panchjanya_only'=>'Panchjanya Only'])->label(false);?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                           <div class="form-group" style="margin-left: 45%">
	        <?= Html::submitButton('Generate Lebels', ['class' =>'btn btn-success']) ?>
	    </div> 
                        </td>
                    </tr>
                    
                </table>
                <?php ActiveForm::end()?>
            </div>
        </div></div></div>