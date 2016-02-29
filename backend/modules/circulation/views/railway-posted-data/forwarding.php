<?php

ini_set('memory_limit', '-1');
ini_set('max_execution_time', 300);
//use Yii;
use backend\modules\circulation\models\RailwayPostedData;
use backend\modules\circulation\controllers\RailwayPostedDataController;
$request=Yii::$app->request;
$id= $request->get('id');
$model= new RailwayPostedData();
$data=$model->find()->where(['rail_id'=>$id])->all();
//print_r($data);

$i=1;$r=1;
foreach ($data as $key => $value) {
	if(($value->pjy)>($value->org)){ $k=$value->pjy;}else{ $k=$value->org;}
	$sum=$value->pjy+$value->org;
	$num=$sum/$value->bundle_size;
	 $j=ceil($num);

	// echo 'this'.$j;
	//echo $value->wt.'//';
	 //$floor=floor($num);
	//for($r=1;$r<$j+1;$r++){
	?>

	<div style="margin-left: 25px;margin-bottom: 25px;margin-right: -90px; width: 490px;float: left; height: 290px;">
	<div style="height: 20px">
	<p style="font-size:9px"><?= $value->license;?>, Issue Dt: <?= $value->date;?>.
1/1 Sanskriti Bhavan, D. B. Gupta Marg, Jhandewalan, N.D-55. <?php if(($value->pjy)>'0'){ echo 'PANCHJANYA';}else{echo "ORGANISER";} ?></p>
	</div>
	<?php $t=$model->Agencyname($value->agency_id);?>
	<div style="height: 15px; margin-left: 40%;"><B><u>BY RAILWAYS</u></B></div>
	<div style="height: 9px; margin-left: 35%;"><?=$t['source'].'-'.$t['train_no'].'&nbsp;'.$t['train_name']?></div>


	<div style="height: 90px">

		<strong><?=$t['name'];?></strong><br/>
		H. No.: <?= $t['hno'];?><br/>
		<?=$t['street'];?><br/>
		District: <?= $t['dist'];?><br/>
		State: <?= $t['state'];?><br/>
		<strong>PO :<?= $t['post'];?></strong><br/>
		<?=$t['pincode'];?>


	</div>
	<div style="height: 20px;"><div><strong>PJY:<?= $value->pjy;?> + ORG : <?= $value->org; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $value->wt.' KGS/'.$j?></strong></div></div>
	</div>

<?php //} 
}?>


<script>
$('.loading')
    .hide()  // hide it initially
    .ajaxStart(function() {
        $(this).show();
    })
    .ajaxStop(function() {
        $(this).hide();
    });
</script>
