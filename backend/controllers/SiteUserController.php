<?php

namespace backend\controllers;

use backend\models\SignupForm;
use backend\models\UpdateSiteUser;
use backend\models\UpdateUserForm;
use backend\models\UserSignUpForm;
use common\models\User;
use Yii;
use common\models\SiteUser;
use common\models\SiteUserSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\Controller;

class SiteUserController extends Controller
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
                SiteUser::findOne($items[$i])->delete();
            }
        }

        $searchModel = new SiteUserSearch();
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
        $model = new UserSignUpForm();

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionUpdate($id)
    {
        $model = new UpdateSiteUser();
        $user = SiteUser::findOne($id);

        if ($model->load(Yii::$app->request->post())) {

            if(empty($model->district_id)){
                $model->district_id = 0;
            }
            if($model->update($id,$model->username,$model->password,$model->email,$model->district_id,$model->rank)){
                return $this->redirect(['view', 'id' => $id]);
            }else{
                return print_r($model->errors);
            }

        } else {

            return $this->render('update', [
                'model' => $model,
                'user' => $user,
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
        if (($model = SiteUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
