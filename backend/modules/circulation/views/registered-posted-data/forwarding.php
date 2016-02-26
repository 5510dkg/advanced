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
	if(($value->pjy)>($value->org)){ $k=$value->pjy;}else{ $k=$value->org;}?>
<div style="width:100%;height:100%; border:1px solid black; padding:0;margin:0;">
<div style="width:100%;height:10px;border-bottom:1px solid black;">
	<div style="margin-left:35%; font-size:10;"><strong>DEPARTMENT OF POSTS, INDIA</strong><br/>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REGISTRATION BRANCH
</div>
</div>
<div style="width:100%;height:10px;">
	<div style="margin-left:25%; font-size:8;">Journal of Uninsured Registered letters Posted by <strong>BHARAT PRAKASHAN (DELHI) LIMITED</strong><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;at the SWAMI RAM TIRATH NAGAR post office on ................................... 2016
</div>
</div>
<table >
	<tr>
		<td style="border-right:1px solid black;border-top:1px solid black; width:20px;">SN</td>
		<td style="border-right:1px solid black;border-top:1px solid black;width:200px;">Customer Name and address</td>
		<td style="border-right:1px solid black;border-top:1px solid black;width:250px;">Barcode</td>
		<td style="border-right:1px solid black;border-top:1px solid black;width:25px;">PJY</td>
		<td style="border-right:1px solid black;border-top:1px solid black;width:25px;">ORG</td>
		<td style="border-right:1px solid black;border-top:1px solid black;width:20px;">Total</td>
		<td style="border-right:1px solid black;border-top:1px solid black;width:20px;">Weight</td>
		<td style="border-top:1px solid black;">Postage</td>
	</tr>
	<?php for($i=1;$i<10;$i++){ ?>

		<tr>
			<td style="border-right:1px solid black;height:100px; width:20px;border-top:1px solid black; width:20px;">SN</td>
			<td style="border-right:1px solid black;height:100px;width:200px;border-top:1px solid black; width:20px;">Customer Name and address</td>
			<td style="border-right:1px solid black;height:100px;width:250px;border-top:1px solid black; width:20px;">Barcode</td>
			<td style="border-right:1px solid black;height:100px;width:25px;border-top:1px solid black; width:20px;">PJY</td>
			<td style="border-right:1px solid black;height:100px;width:25px;border-top:1px solid black; width:20px;">ORG</td>
			<td style="border-right:1px solid black;height:100px;width:20px;border-top:1px solid black; width:20px;">Total</td>
			<td style="border-right:1px solid black;height:100px;width:20px;border-top:1px solid black; width:20px;">Weight</td>
			<td style="border-top:1px solid black;height:100px; width:20px;">Postage</td>
		</tr>
		<?php } ?>

</table>
<!-- <div style="width:100%;height:20px;border-bottom:1px solid black;color:white;background:#4E3B3B;">
	<div style="width:20px; font-size:15; border-right:1px solid black;">&nbsp;&nbsp;SN</div>
</div> -->

</div>
<?php  }
//echo $data->_attributes['id'];
