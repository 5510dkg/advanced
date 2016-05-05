
<?php
$this->title='Home';
?>
<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php
                 $d=\backend\modules\circulation\models\Agency::find()->where(['status'=>'Active'])->all();
                 echo count($d);
              
              ?></h3>

              <p>Active Agencies</p>
            </div>
            <div class="icon">
              <i class="fa fa-bars"></i>
            </div>
            <a href="index.php?r=circulation%2Fagency%2Fsearchview&Agencyview%5Bname%5D=&Agencyview%5Bmail_state_id%5D=&Agencyview%5Baccount_id%5D=&Agencyview%5Bmail_pincode%5D=&Agencyview%5Bmail_p_office%5D=&Agencyview%5Bstatus%5D=Active" class="small-box-footer">View Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php
                 $d1=\backend\modules\circulation\models\Agency::find()->where(['status'=>'Inactive'])->all();
                 echo count($d1);
              
              ?></h3>

              <p>Inactive Agencies</p>
            </div>
            <div class="icon">
              <i class="fa fa-times"></i>
            </div>
            <a href="index.php?r=circulation%2Fagency%2Fsearchview&Agencyview%5Bname%5D=&Agencyview%5Bmail_state_id%5D=&Agencyview%5Baccount_id%5D=&Agencyview%5Bmail_pincode%5D=&Agencyview%5Bmail_p_office%5D=&Agencyview%5Bstatus%5D=Active&Agencyview%5Bname%5D=&Agencyview%5Bmail_state_id%5D=&Agencyview%5Baccount_id%5D=&Agencyview%5Bmail_pincode%5D=&Agencyview%5Bmail_p_office%5D=&Agencyview%5Bstatus%5D=Inactive" class="small-box-footer">View Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue-gradient">
            <div class="inner">
                <h3><?php
                $upper=date('Y-m-d');
                $lower=date( "Y-m-d", strtotime( "$upper -30 days" ) );
                
                $d2=\backend\modules\circulation\models\Agency::find()->where(['between','created_on',$lower, $upper])->andWhere(['status'=>'Active'])->all();
                 echo count($d2);
                
                ?></h3>

              <p>New Agencies Last Month</p>
            </div>
            <div class="icon">
              <i class="fa fa-plus"></i>
            </div>
            <a href="index.php?r=circulation%2Fagency%2Fsearchview&Agencyview%5Bname%5D=&Agencyview%5Bmail_state_id%5D=&Agencyview%5Baccount_id%5D=&Agencyview%5Bmail_pincode%5D=&Agencyview%5Bmail_p_office%5D=&Agencyview%5Bstatus%5D=Active" class="small-box-footer">View Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray-active">
            <div class="inner">
              <h3><?php
                 $d1=\backend\modules\circulation\models\Agency::find()->where(['status'=>'Inactive'])->all();
                 echo count($d1);
              
              ?></h3>

              <p>Closed Last Month</p>
            </div>
            <div class="icon">
              <i class="fa fa-minus"></i>
            </div>
            <a href="index.php?r=circulation%2Fagency%2Fsearchview&Agencyview%5Bname%5D=&Agencyview%5Bmail_state_id%5D=&Agencyview%5Baccount_id%5D=&Agencyview%5Bmail_pincode%5D=&Agencyview%5Bmail_p_office%5D=&Agencyview%5Bstatus%5D=Inactive" class="small-box-footer">View Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div> 