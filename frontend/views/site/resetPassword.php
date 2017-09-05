<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
?>
<section id="page-title">
			<div class="container clearfix">
				<h1><?= Html::encode($this->title) ?></h1>
                <span>Please choose your new password</span>
			</div>
</section>
			<div class="content-wrap">

				<div class="container clearfix">

					<div class="site-index">
<div class="site-reset-password">

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'button button-border button-rounded nomargin']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
