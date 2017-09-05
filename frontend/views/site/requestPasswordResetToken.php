<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
?>
<section id="page-title">
			<div class="container clearfix">
				<h1><?= Html::encode($this->title) ?></h1>
                <span>Please fill out your email. A link to reset password will be sent there</span>
			</div>
</section>
			<div class="content-wrap">

				<div class="container clearfix">

					<div class="site-index">
<div class="site-request-password-reset">

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
            
            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Send', ['class' => 'button button-border button-rounded nomargin']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
        </div>
    </div>
    </div>
