<?php



namespace backend\controllers;



use Yii;

use common\models\ResourceCategoryLang;


use common\models\ResourceCategoryLangSearch;


use yii\web\NotFoundHttpException;

use yii\filters\VerbFilter;

use common\components\Controller;



class ResourceCategoryLangController extends Controller

{



    public function behaviors()

    {

        return [

            'verbs' => [

                'class' => VerbFilter::className(),

                'actions' => [

                    'delete' => ['POST'],

                ],

            ],

        ];

    }





    public function actionIndex()

    {

        if(Yii::$app->request->post()){

            $items = Yii::$app->request->post()['rm-input'];

            $items = explode(',', $items);

            for($i = 0; $i < count($items) - 1;$i++){

                if($items[$i] != null)

                ResourceCategoryLang::findOne($items[$i])->delete();

            }

        }




        $searchModel = new ResourceCategoryLangSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);



        return $this->render('index', [

            'searchModel' => $searchModel,

            'dataProvider' => $dataProvider,

        ]);


    }





    public function actionView($id)

    {

        return $this->render('view', [

            'model' => $this->findModel($id),

        ]);

    }





    public function actionCreate()

    {

        $model = new ResourceCategoryLang();


        Yii::$app->session->set('tab', $model->lang_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->referrer();

        } else {

            return $this->render('create', [

                'model' => $model,

            ]);

        }

    }





    public function actionUpdate($id)

    {

        $model = $this->findModel($id);

        Yii::$app->session->set('tab', $model->lang_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {


            return $this->referrer();

        } else {

            return $this->render('update', [

                'model' => $model,

            ]);

        }

    }





    public function actionDelete($id)

    {

        $this->findModel($id)->delete();



        return $this->redirect(['index']);

    }





    protected function findModel($id)

    {


        if (($model = ResourceCategoryLang::findOne($id)) !== null) {

            return $model;

        } else {

            throw new NotFoundHttpException('The requested page does not exist.');

        }

    }

}

