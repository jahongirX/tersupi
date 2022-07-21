<?php
namespace frontend\controllers;

use Codeception\Lib\Connector\Guzzle;
use common\models\Leader;
use Guzzle\Http\Url;
use common\models\Menu;
use common\models\Partner;
use Yii;
use yii\base\InvalidParamException;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\httpclient\Client;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Cookie;
use yii\web\Response;
use common\models\Contact;
use common\models\Languages;
use common\models\ServiceRequest;
use common\models\TelegramSettings;
use common\models\TelegramUser;
use common\models\Admission;
use common\models\Advertise;
use common\models\Callback;
use common\models\Company;
use common\models\District;
use common\models\Email;
use common\models\Polls;
use common\models\Reception;
use common\models\SearchForm;
use common\models\Faq;
use common\models\Testimonials;
use common\components\Controller;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;

class SiteController extends Controller
{
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

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
             'captcha' => [
//                 'class' => 'yii\captcha\CaptchaAction',
                 'class' => 'common\components\MyCaptchaAction',
                 'fixedVerifyCode' => YII_ENV_TEST ? 'test' : null,
//                 'TestLimit'=>99,
             ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
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

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionSitemap()
    {
        $models = $models = Menu::find()->where('status=1')->andWhere(['parent' => NULL,'type' => Menu::HEADER])->orderBy(['order_by' => SORT_ASC])->all();
        return $this->render('sitemap',[
            'models' => $models
        ]);
    }

    public function actionServices()
    {
        return $this->render('services');
    }





    public function actionSearch()
    {
        $model = new SearchForm();
        $results = null;
        $formSubmitted = false;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $results = $model->search();
            $formSubmitted = true;
        }

        return $this->render('search', [
            'model' => $model,
            'formSubmitted' => $formSubmitted,
            'results' => $results
        ]);
    }

    public function actionAbout()
    {
        $adverts = Advertise::find()->limit(4)->all();
        return $this->render('about',['adverts' => $adverts]);
    }

    public function actionFaq()
    {
        $model = new Faq();

        if(Yii::$app->language == Yii::$app->params['main_language'])
        {
            $models = Faq::find()->where('status=1 AND answer IS NOT NULL')->orderBy(['id' => SORT_DESC])->all();

        } else {

            $lang = Yii::$app->language;
            $id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
            $models = Faq::find()->leftJoin('faq_lang', 'faq.id=faq_lang.parent')->where('faq_lang.status=1 AND faq_lang.answer IS NOT NULL AND faq_lang.lang=' . $id)->orderBy(['faq.id' => SORT_DESC])->all();

        }

        return $this->render('faq', [
            'model' => $model,
            'models' => $models
        ]);
    }

    public function actionContacts()
    {
        $model = new \common\models\Contact();

        $request = Yii::$app->request->post();

        if ($model->load(Yii::$app->request->post()))
        {

            $model->created_date = date('U');



            if($model->save()){

                Yii::$app->session->setFlash('success', Yii::t('main','success-send'));

                return $this->redirect('contacts');

            }else{
                return print_r($model->errors);
            }

        } else {

            return $this->render('contacts', [
                'model' => $model
            ]);

        }
    }

    public function actionContactForm()
    {
        $model = new Contact();

        if ($model->load(Yii::$app->request->post()))
        {
            if ($model->save())
            {


                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return [
                    'success' => true,

                ];




            }
        }

        return false;
    }

    public function actionLeader()
    {

        $models = Leader::find()->where('status=1')->orderBy(['id'=>SORT_ASC])->all();

        return $this->render('leader',[
            'models' => $models,
//            'pagination' => $pagination
        ]);

    }

}

