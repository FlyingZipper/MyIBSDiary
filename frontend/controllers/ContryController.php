<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Contry;

class ContryController extends Controller{

    public function actionIndex(){
        $query = Contry::find();

        $pagination = new Pagination([

        ]);
    }

}