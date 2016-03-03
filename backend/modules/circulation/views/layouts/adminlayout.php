<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use kartik\sidenav\SideNav;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'BPDL',
        'brandUrl' => ['/admin'],
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->name . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>



    <div class="container-fluid">
        <div class="col-xs-6 col-sm-2">
            <?= SideNav::widget([
                'type' => SideNav::TYPE_DEFAULT,
                'heading' => 'Options',
                'items' => [
                    [
                        'url' => 'index.php?r=admin/',
                        'label' => 'Home',
                        'icon' => 'home'
                    ],
                      [
                        'label' => 'User',
                        'icon' => 'glyphicon glyphicon-user',
                        'items' => [
                            ['label' => 'User', 'icon'=>'glyphicon ', 'url'=>'index.php?r=admin/users'],
                            ['label' => 'Upload Users', 'icon'=>'glyphicon ', 'url'=>'index.php?r=admin/users/upload'],
                        ],
                    ],
                    [
                        'label' => 'Settings',
                        'icon' => 'glyphicon glyphicon-cog',
                        'items' => [
                            ['label' => 'Department', 'icon'=>'glyphicon', 'url'=>'index.php?r=settings/department'],
                            ['label' => 'License', 'icon'=>'glyphicon ', 'url'=>'index.php?r=settings/license'],
                            ['label' => 'Sub Department', 'icon'=>'glyphicon ', 'url'=>'index.php?r=settings/sub-department'],
//                            ['label' => 'Modules', 'icon'=>'glyphicon glyphicon-stats', 'url'=>'index.php?r=settings/auth-item'],
//                            ['label' => 'Assignrights', 'icon'=>'glyphicon glyphicon-indent-right', 'url'=>'index.php?r=settings/auth-assignment'],
                            ['label' => 'Designation', 'icon'=>'glyphicon', 'url'=>'index.php?r=settings/designation'],
                            // ['label' => 'Registered Post Tempelate', 'icon'=>'glyphicon', 'url'=>'index.php?r=settings/registered-post'],
                            ['label' => 'Weight', 'icon'=>'glyphicon', 'url'=>'index.php?r=settings/weight'],
                            ['label' => 'Postage Rate', 'icon'=>'glyphicon', 'url'=>'index.php?r=settings/postage-rate'],
                            ['label' => 'Delivery Methods', 'icon'=>'glyphicon', 'url'=>'index.php?r=settings/delivery-methods'],
                            ['label' => 'Bundle Size', 'icon'=>'glyphicon', 'url'=>'index.php?r=settings/bundle-size'],
                        ],
                    ],
                     [
                        'label' => 'Location Master',
                        'icon' => 'glyphicon glyphicon-map-marker',
                        'items' => [
                            ['label' => 'Country', 'icon'=>'glyphicon', 'url'=>'index.php?r=settings/country'],
                            ['label' => 'State', 'icon'=>'glyphicon ', 'url'=>'index.php?r=settings/state'],
                            ['label' => 'District', 'icon'=>'glyphicon', 'url'=>'index.php?r=settings/district'],
                        ],
                    ],
                     [
                        'label' => 'Circulation ',
                        'icon' => 'glyphicon glyphicon-refresh',
                        'items' => [
                            [
                              'label' => 'Agency Master',
                              'icon'=>'glyphicon',
                              'items'=>[
                              ['label'=>'Agency Master','icon'=>'glyphicon-indent-right','url'=>'index.php?r=circulation/agency'],
                              ['label'=>'Upload Multiple','icon'=>'glyphicon-indent-right','url'=>'index.php?r=circulation/agency/upload'],
                              ],
                            ],
                             [
                              'label' => 'Lebels And Forwarding Slips',
                              'icon'=>'glyphicon',
                              'items'=>[
                              ['label'=>'Registred Post','icon'=>'glyphicon-indent-right','url'=>'index.php?r=circulation/registered-post-data'],
                              ['label'=>'Railways Labels','icon'=>'glyphicon-indent-right','url'=>'index.php?r=circulation/railway-post-data'],
                              ['label'=>'Ordinary Post','icon'=>'glyphicon-indent-right','url'=>'index.php?r=circulation/ordinary-post-data'],
                              ],
                            ],


                        ],
                    ],
                    [
                        'label' => 'Billing ',
                        'icon' => 'glyphicon glyphicon-refresh',
                        'items' => [
                            [
                              'label' => 'Agency Billing',
                              'icon'=>'glyphicon',
                              'items'=>[
                              ['label'=>'Add Receipt','icon'=>'glyphicon-indent-right','url'=>'index.php?r=circulation/agency-receipt/searchform'],
                              ['label'=>'Add Credit Note','icon'=>'glyphicon-indent-right','url'=>'index.php?r=circulation/agency-credit-note/searchform'],
                              ],
                            ],
                             [
                              'label' => 'Cluster',
                              'icon'=>'glyphicon',
                              'items'=>[
                              ['label'=>'Registred Post','icon'=>'glyphicon-indent-right','url'=>'index.php?r=circulation/registered-post-data'],
                              ['label'=>'Railways Labels','icon'=>'glyphicon-indent-right','url'=>'index.php?r=circulation/railway-post-data'],
                              ['label'=>'Ordinary Post','icon'=>'glyphicon-indent-right','url'=>'index.php?r=circulation/ordinary-post-data'],
                              ],
                            ],


                        ],
                    ],
                ],
            ]);  ?>
        </div>
      <div class="col-xs-6 col-sm-10">
     <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        </div>
        <div class="col-xs-6 col-sm-10">
        <?= $content ?>
       </div>

    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Bharat Prakashan Delhi Limited <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
