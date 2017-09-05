<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Recipe';
?>
<section id="page-title">
			<div class="container clearfix">
				<h1><?= Html::encode($this->title) ?></h1>
                <span>Share this recipe with your friend</span>
			</div>
</section>
			<div class="content-wrap">

				<div class="container clearfix">

					<div class="site-index">
<div class="site-recipe">

	<div class="container clearfix">   

    <div class="col_half">
        <img src="/uploads/<?= $recette->image_name?>" alt="Photo de la Recette">
    </div>
    <div class="col_half col_last">
    <div class="fancy-title title-bottom-border">
        <h3><?= $recette->title ?></h3>
    </div>
            <h3>Ingredients</h3>
            
        <ul class="iconlist">
            <?php 
                $ingredientsList = explode("\r\n", json_decode($recette->ingredients));
                foreach ($ingredientsList as $anIngredient):
            ?>
                <li style="margin-bottom:20px"><i class="icon-angle-right"></i><?= $anIngredient ?></li>
            <?php endforeach; ?>
        </ul>
            <div class="line topmargin-sm"></div>
            <h3>Steps</h3>
            
        <ul class="iconlist">
            <?php 
                $instructionsList = explode("\r\n", json_decode($recette->instruction));
                foreach ($instructionsList as $anInstruction):
            ?>
                <li style="margin-bottom:20px"><i class="icon-angle-right"></i><?= $anInstruction ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    
    </div>
    </div>
    </div>
    </div>
</div>
