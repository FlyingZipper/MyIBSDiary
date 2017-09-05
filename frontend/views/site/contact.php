<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
?>

<section id="page-title">

			<div class="container clearfix">
				<h1><?= Html::encode($this->title) ?></h1>
                <span>If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.</span>
			</div>
</section>

<div class="content-wrap">

    <div class="container clearfix">

        <div class="site-index">
            <div class="site-contact">

                <div class="row">
                    <div class="col-lg-5">
                        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'email') ?>

                                <?= $form->field($model, 'subject') ?>

                                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                                            <div class="form-group">
                                                <?= Html::submitButton('Submit', ['class' => 'button button-border button-rounded nomargin', 'name' => 'contact-button']) ?>
                                            </div>

                                            <?php ActiveForm::end(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
