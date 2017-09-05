<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<section id="page-title">
			<div class="container clearfix">
				<h1><?= Html::encode($this->title) ?></h1>
			</div>
</section>

            <div class="content-wrap">

                <div class="container clearfix">

                    <div class="site-index">
<div class="site-error">

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

        </div>
    </div>
    </div>

</div>
