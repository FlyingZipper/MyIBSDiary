<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Recettes';
?>

<section id="page-title">
			<div class="container clearfix">
				<h1><?= Html::encode($this->title) ?></h1>
                <span>Discover the best recipe for your IBS diet !</span>
			</div>
</section>

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="site-index">
<div class="site-about">


    <ul class="portfolio-filter style-4 clearfix" data-container="#portfolio">

						<li class="activeFilter"><a href="#" data-filter="*">Show All</a></li>
                        <!-- TODO : POPULATE WITH PHP => make a table in db to store tags-->
                        <?php foreach ($recipe_tags as $recipe_tag): ?>
                            <?= '<li><a href="#" data-filter=".pf-'.strtolower($recipe_tag).'">'.$recipe_tag.'</a></li>'?>
                        <?php endforeach; ?>
	</ul>

    <div class="clear"></div>

    <div id="portfolio" class="portfolio grid-container portfolio-4 clearfix">

                <?php foreach ($recettes as $recette): ?>
                        <?php 
                            $tagList = json_decode($recette->tags);
                            $dataFilters = "";
                            if(!empty($tagList) && is_array($tagList)){                                
                                foreach ($tagList as $key => $value) {
                                        $dataFilters .= " pf-".trim($value);
                                }
                            }
                            else{
                                $tagList = array();
                            }                      
                        ?>
                        
                		<article class="portfolio-item <?= $dataFilters ?>">
							<div class="portfolio-image">

                                <?= '<a href='.Yii::$app->request->url.'>' ?>
                                    <!-- TODO : Dynamic height => fix a max also-->
                                    <?= '<img src="uploads/'.$recette->image_name.'" alt="Recepie Photo" style="visibility: visible; opacity: 1; display: block; max-height: 400px;">' ?><!--image de la recette-->
								</a>

                                <!--TODO : FIX animation prograssive du overlay-->
                                <div class="portfolio-overlay">
                                    <?= '<a class="center" href="'.Yii::$app->request->url.'&recette='.$recette->title.'" class="right-icon"><i class="icon-line-ellipsis"></i></a>' ?>
                                </div>
                            </div>

							<div class="portfolio-desc">
                                <!-- Mettre les tag dans cette section => title eg : Desert au chocolat
                                ======================================================================-->
                                <?= '<h3><a class="center" href="'.Yii::$app->request->url.'&recette='.$recette->title.'">'.$recette->title.'</a></h3>'?>
                                <!-- Mettre les tag dans cette section => tags, eg : desert
                                ======================================================================-->
                                </span>
                                <?php foreach ($tagList as $dataFilter): ?>
                                    <!--TODO href data-filter -->
								    <a href="#" style="margin-left:3px"><?= $dataFilter?></a>
                                <?php endforeach; ?>
                                </span>
							</div>
						</article>
                    
                <?php endforeach; ?>
                 </div>
            </div>
        </div>
    </div>
</div>
