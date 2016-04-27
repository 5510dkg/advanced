<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 6000);
//use Yii;
use backend\modules\circulation\models\VppPostedData;
use backend\modules\circulation\controllers\VppPostedDataController;
$request=Yii::$app->request;
//$id= $request->get('id');
$model= new VppPostedData();
$sort=implode(',', $array);
if($cpy==0){
    $data=$model->find()->where(['vpp_id'=>$id])->orderBy($sort)->all();
}
if($cpy==1){
    $data=$model->find()->where(['vpp_id'=>$id,'org'=>'0'])->orderBy($sort)->all();
}
if($cpy==2){
    $data=$model->find()->where(['vpp_id'=>$id,'pjy'=>'0'])->orderBy($sort)->all();
}
//if($ord=='organiser_only'){
//    $ord='id';
//    $data=$model->find()->where(['ord_id'=>$id,'pjy'=>'0'])->orderBy($ord.' ASC')->all();
//}
//elseif($ord=='panchjanya_only'){
//    $ord='id';
//    $data=$model->find()->where(['ord_id'=>$id,'org'=>'0'])->orderBy($ord.' ASC')->all();
//}
//else{
//$data=$model->find()->where(['ord_id'=>$id])->orderBy($ord.' ASC')->all();
//}

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

	<div style="margin-left: 25px;margin-bottom: 130px;margin-right: -90px; width: 490px;float: left; height: 300px;">
	<div style="height: 20px">
	<p style="font-size:9px"><?= $value->license;?>, Issue Dt: <?= $value->date;?>.
1/1 Sanskriti Bhavan, D. B. Gupta Marg, Jhandewalan, N.D-55. <?php if(($value->pjy)>'0'){ echo 'PANCHJANYA';}else{echo "ORGANISER";} ?></p>
	</div>
	<?php $t=$model->Agencyname($value->agency_id);?>



	<div style="height: 110px">

		<strong><?=strtoupper($t['name'])?></strong><br/>
		H. No.: <?= strtoupper($t['hno'])?><br/>
		<?=strtoupper($t['street'])?><br/>
		DISTRICT: <?= strtoupper($t['dist'])?><br/>
		STATE: <?= strtoupper($t['state'])?><br/>
		<strong>PO :<?= strtoupper($t['post'])?></strong><br/>
		<?=$t['pincode'];?>


	</div>
	<div style="height: 40px;"><div><strong>PJY:<?= $value->pjy;?> + ORG : <?= $value->org; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$r.'/'.$j?></strong></div></div>
	</div>

<?php } }
//echo $data->_attributes['id'];
