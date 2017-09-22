<?php

namespace app\models;

use yii\db\ActiveRecord;

class Recettes extends ActiveRecord
{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    
    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return '{{recettes}}';
    }
    
    public function setDate()
    {
        date_default_timezone_set("America/Montreal");
        $this->created_at = date('Y-m-d H:i:s');
    }
}