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
//print_r($data);exit;

$i=1;$r=1;?>

	<div style="margin-left: 25px;margin-bottom: 40px;margin-right: -30px; width: 100%;float: left; height: 300px;">
            <div style="height: 130px; width: 100%; border: none;">
                <img src="images/header.jpg"/>
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
            <table  class="table-bordered" style="width: 100%; border-collapse: collapse;">
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
                    <?php $pjy[]=$row['pjy']; ?>
                    <?php $org[]=$row['org'];?>
                    <?php
                        $total_amt[]=$row['total_price'];
                        $final_total[]=$row['final_total'];
                        $discounted_amt[]=$row['discounted_amt'];
                        $receipts[]=$row['credit_amt'];
                        
                    ?>
                </tr>
                <?php   endforeach;?>
                <tr>
                    <td><strong>TOTAL SUPPLY</strong></td>
                    <td><?=array_sum($pjy);?></td>
                    <td><?=array_sum($org);?></td>
                    <td>&nbsp;</td>
                </tr>
                
            </table><br/><br/><br/>
            <div style="width: 100%; margin-left: 25px;" class="col-lg-offset-3">
                (A) TOTAL AMOUNT : Rs:&nbsp;&nbsp;<?=array_sum($total_amt)?>/=<br/>
                (B) NET AMOUNT(TOTAL AMOUNT - COMMISSION): Rs:&nbsp;&nbsp;<?=array_sum($final_total)?>/=<br/>
                (C) LAST MONTH'S BALANCE: Rs: 0/=<br/>
                (D) RECEIPTS (IF ANY) IN LAST MONTH: Rs: 0/=<br/>
                (E) ANY ADJUSTMENT MADE IN THIS MONTH : Rs: 0/=<br/>
                (F) CREDIT NOTE (IF ANY) IN THIS MONTH : Rs: 0/=<br/>
                (G) NET BILL AMOUNT DUE AT THE END OF THIS MONTH : Rs: <strong><?=array_sum($final_total)?></strong>/=
            </div>
            <div style="width: 55%;margin-left: 25px; height: 40px; " class="col-lg-offset-3">
             <br/><br/>   Note: this bill is baed on revised commission rates( as stated below)
                <table style=" border: 1px solid black;
border-collapse: collapse;">
                <thead>
                  <tr>
                    <th height="20">Number Of Copies(Monthly Average)</th>
                    <th height="20">New Commission Rate(%)</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td height="20">0-50</td>
                    <td height="20">30%</td>
                  </tr>
                  <tr>
                    <td height="20">51-100</td>
                    <td height="20">32%</td>
                  </tr>
                  <tr>
                    <td>101-200</td>
                    <td>33.33%</td>
                  </tr>
                  <tr>
                      <td>201-400</td>
                      <td>35%</td>
                  </tr>
                  <tr>
                      <td>401-700</td>
                      <td>40%</td>
                  </tr>
                  <tr>
                      <td>701 & above</td>
                      <td>42%</td>
                  </tr>
                </tbody>
              </table>
            </div>
            
	
	</div>


