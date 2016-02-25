<?php
/* @var $this yii\web\View */
use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php 
$this->title='Registered Post';
?>
<div class="panel panel-primary">
      <div class="panel-heading">Registered Post Tempelates</div>
      <!-- <form method="post" action="index.php?r=circulation/RegisteredPostedData/create"> -->
      <div class="panel-body">
      <div class="col-sm-3">
      	<?= DatePicker::widget([
		    //'model' => $model,
		    'name'=>'date',
		    'attribute' => 'date',
		    'template' => '{addon}{input}',
		        'clientOptions' => [
		            'autoclose' => true,
		            'format' => 'yyyy-mm-dd',
		            'daysOfWeekDisabled'=> [1,2,3,4,5,6],
		        ]
		]);?>
		</div>

      	<button type="button" id="submit" class="btn btn-primary btn-lg">Genrate Tempelates</button>
      	</div>
      </div>
    </div>
