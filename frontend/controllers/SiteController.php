<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use app\models\RecetteManager;
use yii\web\UploadedFile;
#use yii\web\Request;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public $current_page = [
        'acceuil' => '#section',
        'recettes' => '#section',
        'a_propos' => '#section',
        'contacter_nous' => '#section',
        'connection' => '#section',
        'inscription' => '#section',
        'add_recepie' => '#section',
    ];

    public $recipe_tags = [
        'Fruits' => 'Fruits',
        'Meat' => 'Meat',
        'Wheat' => 'Wheat',
        'Vegetables' => 'Vegetables',
        'Breakfast' => 'Breakfast',
        'Meal' => 'Meal',
        'Desert' => 'Desert',
        'Pastry' => 'Pastry',
    ];

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {   
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    public function actionSearch()
    {
        return $this->actionRecettes(true);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->current_page['acceuil'] = '#header';
        return $this->render('index');
    }


    public function actionRecettes($search = false)
    {
        $this->current_page['recettes'] = '#header';
        $model = new RecetteManager();

        $request = Yii::$app->request;
        $titreRecette = $request->get('recette');

        #Si on veut voir seulement une recette
        if(!empty($titreRecette)){

            $recette = $model->getRecepie($titreRecette);

            if(!empty($recette)){
                return $this->render('recette', [
                    'recette' => $recette,
                    ]);
            }
        }

        #Si on veut voir toutes les recettes (main onglet recettes [pas de $_GET])
        $recettes = $model->getAllRecepies('title');

        if($search){
            $titreRecette = strtolower($request->get('search'));
            foreach ($recettes as $key => $recette) {
                if(strtolower($recette['title']) == $titreRecette){
                    $recette = $model->getRecepie($recette['title']);
                    return $this->render('recette', [
                        'recette' => $recette,
                        ]);
                }
            }
        }

        $recettes = $model->getAllRecepies();

        
            return $this->render('recettes', [
                'recettes' => $recettes,
                'search' => $search,
                'recipe_tags' => $this->recipe_tags,
                ]);

    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->current_page['connection'] = '#header';
        
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        $this->current_page['connection'] = '#header';

        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {

        $this->current_page['contacter_nous'] = '#header';

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $this->current_page['a_propos'] = '#header';
        return $this->render('about');
    }

    /**
     * A sign up user can add a new recepie.
     *
     * @return mixed
     */
    public function actionAddrecipe()
    {
        $this->current_page['add_recepie'] = '#header';

        if (!Yii::$app->user->identity->super_user) { #TODO VERIFIER IDENTIER SEULEMENT CLAUDIA
            return $this->goHome();
        }

        $model = new RecetteManager();

        if ($model->load(Yii::$app->request->post())) {
        $model->file = UploadedFile::getInstance($model, 'file');

        if ($model->validate()) {
        
            $imageName = $model->addRecipes($model->file->extension);                
            $model->file->saveAs('uploads/' . $imageName);
            return $this->goHome();
        }
    }

    return $this->render('addRecipe', [
        'model' => $model,
        'recipe_tags' => $this->recipe_tags,
        ]);
    
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    { 

        $this->current_page['inscription'] = '#header';

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {

        $this->current_page['connection'] = '#header';

        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        $this->current_page['connection'] = '#header';
        
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
