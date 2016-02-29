<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 300);
//use Yii;
use backend\modules\circulation\models\RegisteredPostedData;
use backend\modules\circulation\controllers\RegisteredPostedDataController;
$request=Yii::$app->request;
$id=$request->get('id');
$dt=$request->get('date');
$newDate = date("d-m-Y", strtotime($dt));
$model= new RegisteredPostedData();
//$data=$model->find()->where(['post_id'=>$id])->all();
//$data=$model->allrec($oo, $ii);
$count = $model->find()->where(['post_id'=>$id])->count();
//print_r($data);
//foreach ($data as $key => $value) {
//    for($p=0;$p<=9;$p++){
//    $d['agency_id']=$value->agency_id;
//    $d['pjy']=$value->pjy;
//    $d['org']=$value->org;
//    $d['total']=$value->org+$value->pjy;
//    $d['weight']=$value->weight;
//    $d['postage']=$value->postage;
//    }
//}
$i=1;$r=1;
$digit=$count/9;
//echo $digit;
$tot=  ceil($digit);
//echo $tot;
for($k=1;$k<=$tot;$k++){
//foreach ($data as $key => $value) {
//	if(($value->pjy)>($value->org)){ $k=$value->pjy;}else{ $k=$value->org;}?>
<div style="width:100%;height:100%; border:1px solid black; padding:0;margin:0;">
<div style="width:100%;height:10px;border-bottom:1px solid black;">
	<div style="margin-left:35%; font-size:10;"><strong>DEPARTMENT OF POSTS, INDIA</strong><br/>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REGISTRATION BRANCH
</div>
</div>
<div style="width:100%;height:10px;">
	<div style="margin-left:25%; font-size:8;">Journal of Uninsured Registered letters Posted by <strong>BHARAT PRAKASHAN (DELHI) LIMITED</strong><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;at the SWAMI RAM TIRATH NAGAR post office on ....<?php echo '<i>'.$newDate.'</i>'; ?>....
</div>
</div>
<table >
	<tr>
		<td style="  width:30px;">SN</td>
		<td style=" width:200px;">Customer Name and address</td>
		<td style=" width:330px;">Barcode</td>
		<td style=" width:33x;">PJY</td>
		<td style=" width:33px;">ORG</td>
		<td style=" width:33px;">Total</td>
		<td style=" width:33px;">Weight</td>
		<td style=" ">Postage</td>
	</tr>
	<?php 
         //$oo=$k*9;
        $oo=10;
               if($k==1){$ii=0;}else{$ii=($k-1)*10;}
            
        $data=$model->allrec($id,$oo, $ii); 
       // echo count($data); 
        
        foreach ($data as $key => $value) { ?>

		<tr>
			<td style=" height:100px; width:20px;  width:20px;"><?=$value['sn'];?></td>
			<td style=" height:100px;width:200px;  width:20px;"><?=$value['address_bar']?></td>
			<td style=" height:100px;width:250px;  width:20px;"></td>
			<td style=" height:100px;width:25px;  width:20px;"><?=$value['pjy']?></td>
			<td style=" height:100px;width:25px;  width:20px;"><?=$value['org']?></td>
			<td style=" height:100px;width:20px;  width:20px;"><?=$value['pjy']+$value['org']?></td>
			<td style=" height:100px;width:20px;  width:20px;"><?=$value['wt']?></td>
			<td style=" height:100px; width:20px;"><?=$value['postage']?></td>
		</tr>
		<?php } ?>

</table>
<!-- <div style="width:100%;height:20px;border-bottom:1px solid black;color:white;background:#4E3B3B;">
	<div style="width:20px; font-size:15;  ">&nbsp;&nbsp;SN</div>
</div> -->

</div>
<?php  } // }
//echo $data->_attributes['id'];
