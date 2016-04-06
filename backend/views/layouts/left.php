<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->name;?></p>

                
            </div>
        </div>

<!--         search form 
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->
       <?php if(Yii::$app->user->identity->role_group_id=='1'){$homeurl='/admin/';
              }
             if(Yii::$app->user->identity->role_group_id=='2'){$homeurl='/user/';
              }
             if(Yii::$app->user->identity->role_group_id=='3'){$homeurl='/approver/';
              }
             if(Yii::$app->user->identity->role_group_id=='4'){$homeurl='/manager/'; 
              }
       ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'fa fa-dashboard', 'url' => [$homeurl]],
                    ['label' => 'Configuration', 'icon' => 'fa fa-cog', 'url' => ['/settings']],
                    ['label' => 'User Management','icon' => 'fa fa-user', 'url' => ['/admin/users'], 'visible' => Yii::$app->user->can('create-user')],
                    ['label' => 'Access Management','icon' => 'glyphicon glyphicon-registration-mark', 'url' => ['/rbac/assignment'], 'visible' => Yii::$app->user->can('access-mgmt')],
                    ['label' => 'Database','icon' => 'fa fa-edit', 'url' => ['/backuprestore'], 'visible' => Yii::$app->user->can('access-mgmt')],
                     ['label' => 'Agency Management','icon' => 'fa fa-edit', 'url' => ['/circulation/agency/list'], 'visible' => Yii::$app->user->can('create-agency')],
                     ['label' => 'Labels Management','icon' => 'fa fa-file-pdf-o', 'url' => ['/user/default/dashboard'], 'visible' => Yii::$app->user->can('generate-labels')],
                     ['label' => 'Billing','icon' => 'fa fa-edit', 'url' => ['/user/default/billingdashboard'], 'visible' => Yii::$app->user->can('generate-bill')],
                    //agency management menu starts here
//                    [
//                        'label' => 'Agency Management',
//                        'icon' => 'fa fa-edit',
//                        'url' => '#',
//                        'visible' => Yii::$app->user->can('create-agency'),
//                        'items' => [
//                             ['label' => 'Search Agency', 'icon' => 'fa fa-search', 'url' => ['/debug'],],
//                            ['label' => 'Create Agency', 'icon' => 'fa fa-plus', 'url' => ['/circulation/agency/create'],],
//                            ['label' => 'Update Agency', 'icon' => 'fa fa-edit', 'url' => ['/debug'],],
//                            ['label' => 'Delete Agency', 'icon' => 'fa fa-minus', 'url' => ['/debug'],],
//                        ],
//                    ],
               //agency managemenet menu ends here     
                ],
            ]
        ) ?>

    </section>

</aside>
