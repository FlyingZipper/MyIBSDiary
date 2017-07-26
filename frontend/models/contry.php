<?php

namespace app\models;

use yii\db\ActiveRecord;

class Contry extends ActiveRecord{
    #With just the above code, Yii will guess the associated table name from the class name
    
    /*
    If no direct match can be made from the class name to the table name,
    you can override the yii\db\ActiveRecord::tableName() method to explicitly specify the associated table name.
    */
}

/*
use app\models\Country;

// get all rows from the country table and order them by "name"
$countries = Country::find()->orderBy('name')->all();

// get the row whose primary key is "US"
$country = Country::findOne('US');

// displays "United States"
echo $country->name;

// modifies the country name to be "U.S.A." and save it to database
$country->name = 'U.S.A.';
$country->save();
*/