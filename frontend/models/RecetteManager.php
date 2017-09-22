<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;
use app\models\Recettes;

/**
* RecetteManager is the model behind the upload form.
*/
class RecetteManager extends Model
{
    /**
    * @var UploadedFile|Null file attribute
    */
    public $file;
    public $title;
    public $ingredients;
    public $instruction;
    public $tags;
    public $created_at;
    public $image_name;
    public $reCaptcha;

    /**
    * @return array the validation rules.
    * extensions accepted are ('extensions' => 'png, jpg')
    */
    public function rules()
    {
            return [
                ['title', 'required'],
                ['title', 'string', 'min' => 2, 'max' => 255],
                ['title', 'unique', 'targetClass' => '\app\models\Recettes', 'message' => 'This title has already been used.'],

                ['ingredients', 'required'],

                ['instruction', 'required'],

                ['tags', 'required'],

                [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxSize' => 2560000, 'tooBig' => 'The image is to larger then 2.50 mb, please compress it'],

                [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '############', 'uncheckedMessage' => 'Please confirm that you are not a robot.']
                
            ];
    }

    /**
     * post new recepies.
     *
     * @return recepies
     */
    public function addRecipes($image_extension)
    {
        $recettes = new Recettes();
        $recettes->title = $this->title;
        $recettes->instruction = json_encode($this->instruction);
        $recettes->ingredients = json_encode($this->ingredients);
        $recettes->tags = json_encode($this->tags);
        $recettes->image_name = $this->title.'.'.$image_extension;

        $recettes->setDate();
        $recettes->save();

        return $recettes->image_name;
        
    }


    /**
     * find a recepie and return it
     *
     * @return recepie ( recepie['title'], recepie['instruction'])
     */
    public function getRecepie($title)
    {
        return Recettes::find()->where(['title' => $title])->one();
    }

    public function getAllRecepies($select = false){
        if(!empty($select)){
            return Recettes::find()->select($select)->orderBy('created_at DESC')->all();
        }
        else{
            return Recettes::find()->orderBy('created_at DESC')->all();
        }
    }
}
?>