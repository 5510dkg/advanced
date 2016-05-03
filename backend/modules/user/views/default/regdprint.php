<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 300);
//use Yii;
use backend\modules\circulation\models\RegisteredPostedData;
use backend\modules\circulation\controllers\RegisteredPostedDataController;
$request=Yii::$app->request;
//$id= $request->get('id');
$model= new RegisteredPostedData();
$sort=implode(',', $array);
if($cpy==0){
    $data=$model->find()->where(['post_id'=>$id])->orderBy($sort)->all();
}
if($cpy==1){
    //echo 'hii';exit;
    $data=$model->find()->where(['post_id'=>$id])->orderBy($sort)->all();
}
if($cpy==2){
    $data=$model->find()->where(['post_id'=>$id,'pjy'=>'0'])->orderBy($sort)->all();
}
$pw=$model->pjyweight();
$ow=$model->orgweight();
//if($ord=='state')$ord='id';
//if($ord=='organiser_only'){
//    $ord='id';
//    $data=$model->find()->where(['post_id'=>$id,'pjy'=>'0'])->orderBy($ord.' ASC')->all();
//}
//elseif($ord=='panchjanya_only'){
//    $ord='id';
//    $data=$model->find()->where(['post_id'=>$id,'org'=>'0'])->orderBy($ord.' ASC')->all();
//}
//else{
//$data=$model->find()->where(['post_id'=>$id])->orderBy($ord.' ASC')->all();
//}
//print_r($data);
$i=1;$r=1;
foreach ($data as $key => $value) {
	if(($value->pjy)>($value->org)){ $k=$value->pjy;}else{ $k=$value->org;}
        if($cpy==1){ 
            $sum=$value->pjy;
            
        }elseif($cpy==2){
            $sum=$value->org;
        }
        else{
           $sum=$value->pjy+$value->org; 
        }
	$num=$sum/$value->bundle_size;
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
             <?php
                $total=($pjy*$pw)+($org*$ow);
                ?>
	<div style="height: 15px">
		<div style="width: 90px; float: left;">
				<p style="font-size: 12px;color: #595959;"><u>Wt</u> :
				<?=$total?> Kg</p>
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
		<strong><?=strtoupper($t['name'])?></strong><br/>
		H. No.: <?= strtoupper($t['hno'])?><br/>
		<?=strtoupper($t['street'])?><br/>
		DISTRICT: <?= strtoupper($t['dist'])?><br/>
		STATE: <?= strtoupper($t['state'])?><br/>
		<strong>PO :<?= strtoupper($t['post'])?></strong><br/>
                <?php if($t['pincode']==0 || $t['pincode']==''){$t['pincode']='----';} ?>
		<?=$t['pincode']?>
 
                <?php if($cpy==1){ $data="PJY : ".$pjy; }elseif($cpy==2){
                    $data=" ORG : ".$org;
                }else{ $data="PJY : ".$pjy.'  +'." ORG : ".$org;} ?>
	</div>
	<div style="height: 50px;"><div><strong><?=$data?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $r.'/'.$j?></strong></div></div>
	</div>

<?php $value->pjy=abs($value->pjy-$value->bundle_size); } }
//echo $data->_attributes['id'];
