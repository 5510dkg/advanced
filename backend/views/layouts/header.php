<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">BPDL</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                 <?php if(Yii::$app->user->identity->role_group_id!='1'){?>
                <?php if(Yii::$app->user->identity->department_id='1'){ ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bookmark fa-fw"></i>HR
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-desktop fa-fw"></i>IT
                    </a>
                </li>
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-certificate fa-fw"></i>PRODUCTION
                    </a>
                </li>
                <?php } ?> 
                  <?php if(Yii::$app->user->identity->department_id=='2'){ ?> 
                      <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bookmark fa-fw"></i>HR
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-desktop fa-fw"></i>IT
                    </a>
                </li>
                      
                      
                      
                      <?php } ?>
                <?php if(Yii::$app->user->identity->department_id=='3'){ ?> 
                      <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bookmark fa-fw"></i>HR
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-desktop fa-fw"></i>IT
                    </a>
                </li>
                      
                      
                      
                      <?php } ?>
                <?php if(Yii::$app->user->identity->department_id=='4'){ ?> 
                      <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bookmark fa-fw"></i>HR
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-desktop fa-fw"></i>IT
                    </a>
                </li>
                      
                      
                      
                      <?php } ?>
                <?php if(Yii::$app->user->identity->department_id=='5'){ ?> 
                      <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bookmark fa-fw"></i>HR
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-desktop fa-fw"></i>IT
                    </a>
                </li>
                      
                      
                      
                      <?php } ?>
                <?php if(Yii::$app->user->identity->department_id=='6'){ ?> 
                      <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bookmark fa-fw"></i>HR
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-desktop fa-fw"></i>IT
                    </a>
                </li>
                      
                      
                      
                      <?php } ?>
                <?php if(Yii::$app->user->identity->department_id=='7'){ ?> 
                      <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bookmark fa-fw"></i>HR
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-desktop fa-fw"></i>IT
                    </a>
                </li>
                      
                      
                      
                      <?php } ?>
                <?php if(Yii::$app->user->identity->department_id=='8'){ ?> 
                      <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bookmark fa-fw"></i>HR
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-desktop fa-fw"></i>IT
                    </a>
                </li>
                      
                      
                      
                      <?php } ?>
                
<!--                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-inr fa-fw"></i>FINANCE
                    </a>
                </li>
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-external-link fa-fw"></i>EDITORIAL
                    </a>
                </li>
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-dot-circle-o fa-fw"></i>CIRCULATION
                    </a>
                </li>
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-certificate fa-fw"></i>PRODUCTION
                    </a>
                </li>
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-gavel fa-fw"></i>OPERATION
                    </a>
                </li>
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-newspaper-o fa-fw"></i>ADVERTISEMENT
                    </a>
                </li>-->
                 <?php } ?>
                
                
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       
                        <span class="hidden-xs"><i class="fa fa-power-off"></i> </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/user.jpg" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?=Yii::$app->user->identity->name?> 
                            </p>
                        </li>
                        <!-- Menu Body -->
                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="index.php?r=site/changepassword" class="btn btn-default btn-flat">Change Password</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
