<?php
use yii\data\Sort;
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 300);
//use Yii;
use backend\modules\circulation\models\RailwayPostedData;
use backend\modules\circulation\controllers\RailwayPostedDataController;
$request=Yii::$app->request;
//$id= $request->get('id');

$model= new RailwayPostedData();
$sort=implode(',', $array);
//print_r($array);exit;
if($cpy==0){
    $data=$model->find()->where(['rail_id'=>$id])->orderBy($sort)->all();
}
if($cpy==1){
    $data=$model->find()->where(['rail_id'=>$id,'org'=>'0'])->orderBy($sort)->all();
}
if($cpy==2){
    $data=$model->find()->where(['rail_id'=>$id,'pjy'=>'0'])->orderBy($sort)->all();
}
   // print_r($data);exit;
//}
//elseif($ord=='panchjanya_only'){
//    $ord='id';
//    $data=$model->find()->where(['rail_id'=>$id,'org'=>'0'])->orderBy($ord.' ASC')->all();
//}
//else{
//$data=$model->find()->where(['rail_id'=>$id])->orderBy($ord.' ASC')->all();
//}
//print_r($data);exit;

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

	<div style="margin-left: 25px;margin-bottom: 100px;margin-right: -90px; width: 490px;float: left; height: 300px;">
	<div style="height: 20px">
	<p style="font-size:9px"><?= $value->license;?>, Issue Dt: <?= $value->date;?>.
1/1 Sanskriti Bhavan, D. B. Gupta Marg, Jhandewalan, N.D-55. <?php if(($value->pjy)>'0'){ echo 'PANCHJANYA';}else{echo "ORGANISER";} ?></p>
	</div>
	<?php $t=$model->Agencyname($value->agency_id);?>
	<div style="height: 15px; margin-left: 40%;"><B><u>BY RAILWAYS</u></B></div>
	<div style="height: 29px; margin-left: 35%;"><?=strtoupper($t['source'].'-'.$t['train_no'].'&nbsp;'.$t['train_name'])?></div>


	<div style="height: 110px">

            <strong><?=  strtoupper($t['name'])?></strong><br/>
		H. NO.: <?= $t['hno'];?><br/>
		<?=strtoupper($t['street'])?><br/>
		DISTRICT: <?= strtoupper($t['dist'])?><br/>
		STATE: <?= strtoupper($t['state'])?><br/>
		<strong>PO :<?= strtoupper($t['post'])?></strong><br/>
		<?=$t['pincode'];?>


	</div>
	<div style="height: 100px;"><div><strong>PJY:<?= $value->pjy;?> + ORG : <?= $value->org; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $value->wt.' KGS/'.$j?></strong></div></div>
	</div>

<?php } }?>


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
