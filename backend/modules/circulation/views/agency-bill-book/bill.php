<?php
$this->title='Agency Billing';
$inc=1;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="row">
    <div class="page-header">
        <h1>Agency Billing</h1>
    </div>
</div>
<div class="col-lg-12">
    <table style="width:100%" id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
        <tr role="row">
            <th>#</th>
            <th>Agency Name</th>
            <th>PJY</th>
            <th>ORG</th>
            <th>Total Copies</th>
            <th>Net Amount</th>
            
            <th>Discounted Amt.</th>
            <th>Final Amount</th>
            <th>Options</th>
        </tr>
        <?php foreach($rs as $row): ?>
        <tr>
            <td><?=$inc;?></td>
            <td><?=$row['name'];?></td>
            <td><?=$row['pjy'];?></td>
            <td><?=$row['org'];?></td>
            <td><?=$row['total_copies'];?></td>
            <td><?=$row['total_price'];?></td>
            
            <td><?=$row['discounted_amt'];?></td>
            <td><?=$row['final_amt'];?></td>
            <td><?php echo HTML::a('<span class="glyphicon glyphicon-eye-open"></span>',['/']) ?></td>
            
            
            
        </tr>
        <?php $inc++; ?>
        <?php endforeach; ?>
    </table>
</div>