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
                    
                ],
            ]
        ) ?>

    </section>

</aside>
