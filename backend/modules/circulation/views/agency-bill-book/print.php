<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 6000);
use backend\modules\circulation\models\AgencyBillBook;
$agency_id=Yii::$app->request->get('agency_id');
$month=Yii::$app->request->get('month');
$agency=new AgencyBillBook();
$data=$agency->getPrintdetails($month, $agency_id);
//print_r($data);

$i=1;$r=1;?>


	<div style="margin-left: 25px;margin-bottom: 40px;margin-right: -90px; width: 490px;float: left; height: 300px;">
            <img src="logoa.png" width="100%">
	
	</div>


