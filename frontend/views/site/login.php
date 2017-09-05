<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<section id="page-title">
			<div class="container clearfix">
				<h1><?= Html::encode($this->title) ?></h1>
                <span>Please fill out the following fields to login</span>
			</div>
</section>
			<div class="content-wrap">

    <div class="container clearfix">

        <div class="site-index">
            
            <div class="site-login">

                <div class="row">
                    <div class="col-lg-5">
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'password')->passwordInput() ?>

                                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                                    <div style="color:#999;margin:1em 0">
                                        If you forgot your password you can
                                        <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                                    </div>

                                    <div class="form-group">
                                        <?= Html::submitButton('Connection !', ['class' => 'button button-border button-rounded button-large noleftmargin topmargin-sm', 'name' => 'login-button']) ?>
                                    </div>


                                    <?php ActiveForm::end(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
