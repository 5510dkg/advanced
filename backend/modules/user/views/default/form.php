<?php
$this->title='Home';

?>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

?> 
<div id="loadercomp">
<div class=" box box-primary">
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
                        <td colspan="2">
                              <?= $form->field($model, 'date')->widget( DatePicker::className(), [
                            // inline too, not bad
                            'inline' => false, 
                            // modify template for custom rendering
                            // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                            'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'daysOfWeekDisabled'=> [1,2,3,4,5,6],
                           // 'startDate'=>date('Y-m-d'),
                        ]
                        ]); ?>
                        </td>
                    </tr>
                    <tr>
                    
                    <th>
                        Name
                    </th>
                    <th colspan="5">
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
                            <?=$form->field($model, 'state')->dropDownList([''=>'Please Select','1'=>'State'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'district')->dropDownList([''=>'Please Select','1'=>'District'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'po')->dropDownList([''=>'Please Select','1'=>'Post Office'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'pjy')->dropDownList([''=>'Please Select','1'=>'Panchjanya Only'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'org')->dropDownList([''=>'Please Select','1'=>'Organiser Only'])->label(false);?>
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
                            <?=$form->field($model, 'state')->dropDownList([''=>'Please Select','1'=>'State'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'district')->dropDownList([''=>'Please Select','1'=>'District'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'po')->dropDownList([''=>'Please Select','1'=>'Post Office'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'pjy')->dropDownList([''=>'Please Select','1'=>'Panchjanya Only'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'org')->dropDownList([''=>'Please Select','1'=>'Organiser Only'])->label(false);?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?=$form->field($model, 'org')->checkbox(array( 
                                            //'label'=>'railway', 
                                            'labelOptions'=>array('style'=>'padding:5px;'), 
                                            'disabled'=>false 
                                            )) 
?>
                        </td>
                        <td>
                            <?=$form->field($model, 'state')->dropDownList([''=>'Please Select','1'=>'State'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'district')->dropDownList([''=>'Please Select','1'=>'District'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'po')->dropDownList([''=>'Please Select','1'=>'Post Office'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'pjy')->dropDownList([''=>'Please Select','1'=>'Panchjanya Only'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'org')->dropDownList([''=>'Please Select','1'=>'Organiser Only'])->label(false);?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                           <div class="form-group" style="margin-left: 45%">
	        <?= Html::submitButton('Generate Lebels', ['class' =>'btn btn-success',

]) ?>
	    </div> 
                        </td>
                    </tr>
                    
                </table>
                <?php ActiveForm::end()?>
            </div>
        </div></div></div>
</div>

