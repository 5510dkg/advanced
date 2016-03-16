<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 6000);
//use Yii;
use backend\modules\circulation\models\OrdinaryPostedData;
use backend\modules\circulation\controllers\OrdinaryPostedDataController;
$request=Yii::$app->request;
$id= $request->get('id');
$model= new OrdinaryPostedData();
$data=$model->find()->where(['ord_id'=>$id])->all();
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
	for($r=1;$r<$j+1;$r++){
	?>

	<div style="margin-left: 25px;margin-bottom: 30px;margin-right: -90px; width: 490px;float: left; height: 300px;">
	<div style="height: 20px">
	<p style="font-size:9px"><?= $value->license;?>, Issue Dt: <?= $value->date;?>.
1/1 Sanskriti Bhavan, D. B. Gupta Marg, Jhandewalan, N.D-55. <?php if(($value->pjy)>'0'){ echo 'PANCHJANYA';}else{echo "ORGANISER";} ?></p>
	</div>
	<?php $t=$model->Agencyname($value->agency_id);?>



	<div style="height: 90px">

		<strong><?=$t['name'];?></strong><br/>
		H. No.: <?= $t['hno'];?><br/>
		<?=$t['street'];?><br/>
		District: <?= $t['dist'];?><br/>
		State: <?= $t['state'];?><br/>
		<strong>PO :<?= $t['post'];?></strong><br/>
		<?=$t['pincode'];?>


	</div>
	<div style="height: 20px;"><div><strong>PJY:<?= $value->pjy;?> + ORG : <?= $value->org; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$r.'/'.$j?></strong></div></div>
	</div>

<?php } }
//echo $data->_attributes['id'];
