<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\typeahead\Typeahead;
use dosamigos\datepicker\DatePicker;
use yii\helpers\Url;
use kartik\export\ExportMenu;


$this->title='Agency|Search';
?>

<?= $this->render('searchview', ['model' => $searchModel]) ?>
<div class=" box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Agency Listings</h3>
        <div class="box-tools pull-right">
            <?php
            echo ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                     ['class' => 'yii\grid\SerialColumn'],
                    'name',
        'mobile_no',
         [
                'attribute' => 'route_id',
                'value' => 'deliveryMethods.name',
         ],
        'landline_no',
        'email',
        'security_amt',
        'agency_type',            
        'status',
        'panchjanya',
        'organiser',
        'mail_street_address',
        [
            'attribute'=>'mail_district_id',
            'value'=>'district.name'
        ],
         [
             'attribute'=>'mail_p_office',
             'value'=>'mail_p_office',
         ],           
        'mail_pincode',
        'reference',
                    
                    
                ],
                'target'=> '_self',
]);

            ?>
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
    <div class="row">
        <div class="col-md-12">    
    <?= \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
     'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'name',
        'mobile_no',
         [
                'attribute' => 'route_id',
                'value' => 'deliveryMethods.name',
         ],
        'panchjanya',
        'organiser',
        'mail_street_address',
        'mail_pincode',
        'reference',
        ['class'=>'yii\grid\ActionColumn',
         'template'=>'{update}',
        'buttons' => [
        'bill' => function ($url, $model) {
            return Html::a('<span></span><span class="glyphicon glyphicon glyphicon-eye"></span>', $url, [
                        'title' => Yii::t('app', 'edit'),
            ]);
         }
        ],
         'urlCreator' => function($action, $model, $key, $index) { 
                        return Url::toRoute([$action, 'id' => $model->id,'q'=>'add']);
        },
            ],
         ],
        
    'options' => [
        'tag' => 'div',
        'class' => 'list-wrapper',
        'id' => 'list-wrapper',
    ],
    'layout' => "{summary}\n{items}\n{pager}",
   
]);
?>
        </div>
</div>
    </div>
</div>
