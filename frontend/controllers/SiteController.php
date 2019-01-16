<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\bootstrap\ActiveForm;
use yii\filters\VerbFilter;
use common\models\BenutzerLoginForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['create', 'update'],
                'rules' => [
                    // deny all POST requests
                    [
                        'allow' => false,
                        'verbs' => ['POST']
                    ],
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
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
     * {@inheritdoc}
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

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) { 
            return $this->goHome();
        }

        $model = new BenutzerLoginForm();
        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['uebung/index']);
        } else {
            $model->password = '';

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
        Yii::$app->user->logout();

        return $this->goHome();
    }


    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        
        if(Yii::$app->request->isAjax && $model->load($_POST)){
            \Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                return $this->redirect(['login']);
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}
