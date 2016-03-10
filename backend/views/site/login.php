<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

    
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                            <fieldset>
                                <div class="form-group">
                                     <?= $form->field($model, 'username') ?>
                                </div>
                                <div class="form-group">
                                    <?= $form->field($model, 'password')->passwordInput() ?>
                                </div>
                                <div class="checkbox">
                                    <label>
                                         <?= $form->field($model, 'rememberMe')->checkbox() ?>
                                    </label>
                                </div>
                                
                                 <?= Html::submitButton('Login', ['class' => 'btn btn-lg btn-success btn-block', 'name' => 'login-button']) ?>
                            </fieldset>
                         <?php ActiveForm::end(); ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
