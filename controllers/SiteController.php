<?php

namespace app\controllers;

use app\models\Account;
use app\models\RegisterForm;
use app\models\User;
use app\models\VideoLessons;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $videoLesons = VideoLessons::find()->all();
            $account = Account::find()->select(['lesson_number'])->where(['username' => Yii::$app->user->identity->username])->all();
            if(Yii::$app->user->identity->username == 'admin' ){
                return $this->redirect('video-lessons');
            }
            return $this->redirect('lessons');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
//    public function actionSignup(){
//        if (!Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//        $model = new RegisterForm();
//
//        return $this->render('signup', compact('model'));
//    }

    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();

//        if(Yii::$app->request->isPost)
//        {
//            $model->load(Yii::$app->request->post());
//            if ($model->register()){
//                return $this->redirect(['auto/login']);
//            }
//        }
//
//
//        return $this->render('register', ['model' => $model]);

        if ($model->load(Yii::$app->request->post())) {
            if($user = $model->register()){
                if(Yii::$app->getUser()->login($user)){
                    return $this->goHome();
                }
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function action  ()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionGreate()
    {
        return $this->render('greate');
    }


    public function actionSomeres()
    {
        return $this->render('greate');
    }

}
