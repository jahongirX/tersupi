<?php

namespace backend\controllers;

use common\components\StaticFunctions;
use Yii;
use common\models\Leader;
use common\models\LeaderSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\Controller;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

class LeaderController extends Controller
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
                Leader::findOne($items[$i])->delete();
            }
        }

        $searchModel = new LeaderSearch();
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
        $model = new Leader();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()))
        {
            $image = UploadedFile::getInstance($model, 'image');

            if($model->save())
            {
                if($image)
                {
                    $model->image = StaticFunctions::saveImage($image, $model->id, 'leader');
                }

                $model->save();

                return $this->redirect(['update', 'id' => $model->id]);

            } else
                return print_r($model->errors,true);

        } else {

            return $this->render('create', [
                'model' => $model,
            ]);

        }
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $image_old = $model->image;

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()))
        {
            $image = UploadedFile::getInstance($model, 'image');

            if($model->save())
            {

                if($image)
                {
                    $model->image = StaticFunctions::saveImage($image, $model->id, 'leader');
                    StaticFunctions::deleteImage($image_old, $model->id, 'leader');

                } else {

                    $model->image = $image_old;

                }

                $model->save();

                return $this->redirect(['update', 'id' => $model->id]);

            } else
                return print_r($model->errors,true);

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
        if (($model = Leader::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
