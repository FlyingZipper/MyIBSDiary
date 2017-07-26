<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Recepies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <h1><?= Html::encode($message) ?></h1>
    <div class="col-md-4">
        <p>col 1</p>
    </div>

    <div class="col-md-4">
        <p>col 2</p>
    </div>

    <div class="col-md-4">
        <p>col 3</p>
    </div>

</div>
