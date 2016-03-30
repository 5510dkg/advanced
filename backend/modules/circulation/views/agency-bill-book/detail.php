<?php 
use yii\helpers\Url;
use yii\helpers\Html;
$this->title='Billing Details';
$new =date( "M-Y", strtotime( "$month" ) );
?>

<div class="row">
    <div class="page-header">
        <h3>Agency Billing for the month of <?php echo $new ?> </h3>
    </div>
</div>
<div class="col-lg-12">
    <table style="width:100%" id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
        <tr role="row">
            <th>Name</th>
            <th>Date</th>
            <th>PJY</th>
            <th>ORG</th>
            <th>Total Copies</th>
            <th>Unit Price</th>
            <th>Net Amt.</th>
            <th>Discount</th>
            <th>Discounted Amt.</th>
            <th>Final Amount</th>
           
        </tr>
        <?php foreach ($data as $row):?>
        <tr>
            <td><?= $row['name'];?></td>
            <td><?=$row['date'];?></td>
            <td><?=$row['pjy'];?></td>
            <td><?=$row['org'];?></td>
            <td><?=$row['total_copies'];?></td>
            <td><?=$row['unitprice'];?></td>
            <td><?=$row['total_price'];?></td>
            <td><?=$row['discount'];?></td>
            <td><?=$row['discounted_amt'];?></td>
            <td><?=$row['final_total'];?></td>
            <?php  $id=$row['id']; ?>
        </tr>
            
        <?php endforeach; ?>
        
    </table>
    <p><a class="btn btn-lg btn-success" href="index.php?r=circulation/billing/view&id=<?=$id?>&month=<?=$month?>">Back</a></p>
</div>
