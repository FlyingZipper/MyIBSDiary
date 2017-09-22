<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


$this->title = 'Add Recipe';
?>

<section id="page-title">
			<div class="container clearfix">
				<h1><?= Html::encode($this->title) ?></h1>
                <span>Please fill out the following fields to add a new recipe</span>
			</div>
</section>

<div class="content-wrap">

    <div class="container clearfix">
        <div class="site-index">
            <div class="site-about">

    <div class="row">
        <div class="col-md-7">
            <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'title') ?>
                
                <?= $form->field($model, 'ingredients')->textarea(['rows' => 6])->label('ingredients') ?>

                <?= $form->field($model, 'instruction')->textarea(['rows' => 6])->label('preparation') ?>

                <?= $form->field($model, 'tags')->dropDownList($recipe_tags,['class' => 'select-tags form-control select2-hidden-accessible',
                'multiple' => 'multiple', 'tabindex' => '-1', 'aria-hidden' => 'true', 'style' =>"width:100%;"]); ?>

                <div class="form-group">
                    <?= $form->field($model, 'file', [
                        'template' => 
                        '<div class="row" style="padding: 0 15px">
                                <label for="recettemanager-file" class="button button-border button-rounded nomargin selected-file">
                                        <i class="icon-upload-alt"></i>
                                        Choose a file
                                    </label>
                                <div style="display:none">
                                    {input}
                                </div>
                                {error}
                            </div>'
                        ])->fileInput() ?>
                </div>

                

                <!-- ADD RECAPCTHA
                =========================================================== -->
                <?= $form->field($model, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className()) ?>

                
                <div class="form-group">
                    <?= Html::submitButton('Post Recipe', ['class' => 'button button-border button-rounded nomargin', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

            </div>
        </div>
    </div>
</div>