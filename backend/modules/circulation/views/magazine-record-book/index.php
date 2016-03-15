<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\circulation\models\MagazineRecordBookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Magazine Record Books';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>

<div class="row">
    <div class="page-header">
        <h1>Magazine issues</h1>
    </div>
</div>
<div class="magazine-record-book-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Create new Magazine Record Books','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Magazine Record Books listing',
                'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>Html::button('Generate Bill',['class'=>'btn btn-primary','id'=>'billgeneration','onclick'=>'campaignList()']).                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>

<script>
   function campaignList(){
        $(".wrap").html("<img src='332.gif'>"); // show the ajax loader
        $.ajax({
            type:'post',
            url:'index.php?r=circulation/agency-bill-book/create',
            data:{},
            success:function(data){
                console.log(data);
                $(".wrap").html(data);  // this will hide the loader and replace it with the data                            
            }
        });
    }
</script>    
