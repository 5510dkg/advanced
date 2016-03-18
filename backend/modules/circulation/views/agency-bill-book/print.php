<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 6000);
use backend\modules\circulation\models\AgencyBillBook;
use backend\modules\settings\models\State;
use backend\modules\settings\models\District;
$agency_id=Yii::$app->request->get('agency_id');
$month=Yii::$app->request->get('month');
$agency=new AgencyBillBook();
$data=$agency->getPrintdetails($month, $agency_id);
//print_r($data);

$i=1;$r=1;?>


	<div style="margin-left: 25px;margin-bottom: 40px;margin-right: -30px; width: 100%;float: left; height: 300px;">
            <div style="height: 130px; width: 100%; border: 1px solid black;">
                hii
            </div>
            <div style="width: 100%;height: 15px;">
             Code:&nbsp;&nbsp;&nbsp;&nbsp;<?=$data[0]['account_id']?> 
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Bill Number: 24
            </div>
            <div style="width: 40%;margin-left: 120px; float: left; ">
                <br/>
                <?=$data[0]['name'];?><br/>
                <?=$data[0]['add_house_no']?><br/>
                <?=$data[0]['add_street_address']?><br/>
                <?=$data[0]['add_p_office']?> &nbsp;&nbsp;&nbsp;&nbsp;<?=$data[0]['add_pincode']?>,<br/>
                <?php $state= State::getName($data[0]['add_state_id']) ?>
                <?php $district=  District::getName($data[0]['add_district_id']) ?>
                <?=$district[0]['name'];?>,
                <?=$state[0]['name'];?><br/>
                
            </div>
            <div style="width: 40%;margin-left:30px; float: left; ">
                <br/>
                 <?=$data[0]['months']?><br/>
                 Security Amt: Rs: &nbsp;&nbsp;<?=$data[0]['security_amt']?>/=
                <br/>
                
            </div><br/>
            <br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BILLING DETAILS<br/>
            <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" style="width: 100%;border: 1px solid black;">
                <tr>
                    <td>ISSUE DATE</td>
                    <td>PANCHJANYA SUPPLY</td>
                    <td>ORGANISER SUPPLY</td>
                    <td>UNIT PRICE</td>
                </tr>
                <?php foreach ($data as $row):?>
                <tr>
                    <td><?=$row['issue_date']?></td>
                    <td><?=$row['pjy']?></td>
                    <td><?=$row['org']?></td>
                    <td><?=$row['price_per_piece']?></td>
                </tr>
                <?php   endforeach;?>
                
            </table>
            
	
	</div>


