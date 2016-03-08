<?php
use yii\helpers\Html;

?>
<p>
    The Bill Has been Generated. You can Click Below and view the genrated Bill.
</p>
<?php echo Html::a('Show Generated Bill', ['/circulation/agency-bill-book'], ['class'=>'btn btn-lg btn-success']) ?>

