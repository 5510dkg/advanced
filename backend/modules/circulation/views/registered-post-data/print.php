<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 300);
//use Yii;
use backend\modules\circulation\models\RegisteredPostedData;
use backend\modules\circulation\controllers\RegisteredPostedDataController;
$request=Yii::$app->request;
$id= $request->get('id');
$model= new RegisteredPostedData();
$data=$model->find()->where(['post_id'=>$id])->all();
//print_r($data);
$i=1;$r=1;
foreach ($data as $key => $value) {
	if(($value->pjy)>($value->org)){ $k=$value->pjy;}else{ $k=$value->org;}

	$num=$k/$value->bundle_size;
	 $j=ceil($num);
	// echo 'this'.$j;
	//echo $value->wt.'//';

	for($r=1;$r<$j+1;$r++){
	?>

	<div style="margin-left: 25px;margin-bottom: 140px;margin-right: -90px; width: 490px;float: left; height: 290px;">
	<div style="height: 20px">
	<p style="font-size:9px"><?=$value->license;?>.Issue Dt:<?= $value->date;?>. To be delivered at Window. 1/1 Sanskriti Bhavan, D. B. Gupta Marg,
Jhandewalan, N.D-55. <?php if(($value->pjy)>($value->org)){ echo 'PANCHJANYA';}else{echo "ORGANISER";} ?></p>
	</div>
	<div style="height: 15px">
		<div style="width: 90px; float: left;">
				<p style="font-size: 12px;color: #595959;"><u>Wt</u> :
				<?= abs($value->wt/1000);?> Kg</p>
		</div>
		<div style="width: 130px; float: right; ">
				<p style="font-size: 12px;color: #595959;"><u>Postage</u>
				: Rs. <?= $value->postage;?>/=</p>
		</div>
	</div>
	<div style="height: 15px; margin-left: 40%;"><B><u>REGISTERED</u></B></div>
	<div style="height: 20px;"><strong>SN</strong>: <?= $value->sn; ?></div>

	<div style="height: 110px">
		<?php $t=$model->Agencyname($value->agency_id);?>
		<strong><?=$t['name'];?></strong><br/>
		H. No.: <?= $t['hno'];?><br/>
		<?=$t['street'];?><br/>
		District: <?= $t['dist'];?><br/>
		State: <?= $t['state'];?><br/>
		<strong>PO :<?= $t['post'];?></strong><br/>
		<?=$t['pincode'];?>


	</div>
	<div style="height: 50px;"><div><strong>PJY:<?= $value->pjy;?> + ORG : <?= $value->org; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $r.'/'.$j?></strong></div></div>
	</div>

<?php } }
//echo $data->_attributes['id'];
