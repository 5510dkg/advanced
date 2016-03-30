<?php

use yii\widgets\DetailView;
$inc=1;
/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\Billing */
?>
<div class="row">
    <div class="page-header">
        <h1>Billing Detail</h1>
    </div>
</div>
<?php print_r($model); ?>
<div class="billing-view">
    <div class="row">
        <table class="table table-striped table-bordered detail-view">
            <tbody>
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        Issue date
                    </td>
                    <td>
                        PJY
                    </td>
                    <td>
                        ORG
                    </td>
                    <td>
                        DISCOUNT
                    </td>
                   
                </tr>
               <?php foreach($model as $row): ?> 
                
                <tr>
                    <td><?= $inc;?></td>
                    <td><?=$row['date']?></td>
                    <td><?=$row['pjy']?></td>
                    <td><?=$row['org']?></td>
                </tr>
                
                
                
                <?php
                $inc++;
                endforeach; ?>
            </tbody>
        </table>  
    </div>

</div>
