<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Auth Items';
$this->params['breadcrumbs'][] = $this->title;
$inc=1;
$i=0;
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Update/Assign Access Rights </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<?php $form = ActiveForm::begin([
    'method' => 'post',
    'action'=>'index.php?r=auth-item/create'
]); ?>
<table class="table-striped" style="width: 100%;">
    <tr>
        <th>#</th>
        <th>Module Name</th>
        <th>Access</th>
    </tr>
    <?php foreach($lists as $row){ ?>
    <tr>
        <td><?=$inc;?></td>
        <input type="hidden" class="form-control"  name="user_id" value="<?=$user;?>"/>
        <td><input type="text" class="form-control" readonly="readonly" name="name[]" value="<?=$row->name;?>"/></td>
        
        <td><input type="radio" name="radio<?= $i;?>" value="1">Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="radio<?=$i;?>" value="0" checked="checked">No
        </td>
        
    </tr>
    <?php $inc++;$i++; } ?>
    
</table>

<div class="col-lg-offset-4"><?=Html::submitButton('Save',['class'=>'btn btn-lg btn-success'])?>
</div>
<?php ActiveForm::end() ?>
   

