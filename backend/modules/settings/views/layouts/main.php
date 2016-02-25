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
        'brandUrl' => Yii::$app->homeUrl,
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
                        'label' => 'Settings',
                        'icon' => 'glyphicon glyphicon-cog',
                        'items' => [
                            ['label' => 'Department', 'icon'=>'glyphicon glyphicon-th-list', 'url'=>'index.php?r=settings/department'],
                            ['label' => 'Sub Department', 'icon'=>'glyphicon glyphicon-th', 'url'=>'index.php?r=settings/sub-department'],
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
