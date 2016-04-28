<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 6000);
//use Yii;
use backend\modules\circulation\models\OrdinaryPostedData;
use backend\modules\circulation\controllers\OrdinaryPostedDataController;
$request=Yii::$app->request;
//$id= $request->get('id');
$model= new OrdinaryPostedData();
$sort=implode(',', $array);
if($cpy==0){
    $data=$model->find()->where(['ord_id'=>$id])->orderBy($sort)->all();
}
if($cpy==1){
    $data=$model->find()->where(['ord_id'=>$id])->orderBy($sort)->all();
}
if($cpy==2){
    $data=$model->find()->where(['ord_id'=>$id])->orderBy($sort)->all();
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
	if($cpy==1){ 
            $sum=$value->pjy;
            
        }elseif($cpy==2){
            $sum=$value->org;
            
        }else{
           $sum=$value->pjy+$value->org; 
        }
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
                 <?php if($t['pincode']==0 || $t['pincode']==''){$t['pincode']=='----';} ?>
		<?=$t['pincode'];?>
 <?php
                $sum=$sum-$value->bundle_size;
                if($value->pjy >= $value->bundle_size){
                    $org=0;
                    $pjy=$value->bundle_size;
                    
                }elseif($value->pjy!=0 && $value->pjy<$value->bundle_size){
                    $pjy=$value->pjy;
                }
                 else{
                    $pjy=0;
                }
                if($value->org >= $value->bundle_size){
                    $pjy=0;
                    $org=$value->bundle_size;
                    
                }elseif($value->org!=0 && $value->org<$value->bundle_size){
                    $org=$value->org;
                }else{
                    $org=0;
                }
                if(($pjy+$org)>=$value->bundle_size){
                    $org=0;
                }else{
                    $org=$value->org;
                }
                
                
                
                ?>
                <?php if($cpy==1){ $data="PJY : ".$pjy; }elseif($cpy==2){
                    $data=" ORG : ".$org;
                }else{ $data="PJY : ".$pjy.'  +'." ORG : ".$org;} ?>
                
                
	</div>
	<div style="height: 40px;"><div><strong><?=$data;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$r.'/'.$j?></strong></div></div>
	</div>

<?php $value->pjy=abs($value->pjy-$value->bundle_size); } }
//echo $data->_attributes['id'];
