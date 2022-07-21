<?php

namespace backend\controllers;

use common\components\StaticFunctions;
use common\models\Attach;
use Yii;
use common\models\Project;
use common\models\ProjectSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\Controller;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

class ProjectController extends Controller
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
                Project::findOne($items[$i])->delete();
            }
        }

        $searchModel = new ProjectSearch();
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
        $model = new Project();

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
                    $model->image = StaticFunctions::saveImage($image, $model->id, 'project');
                }

                $file = UploadedFile::getInstance($model, 'file');

                if($file){
                    $model->file = StaticFunctions::saveFile($file,$model->id,'project');
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
                    $model->image = StaticFunctions::saveImage($image, $model->id, 'project');
                    StaticFunctions::deleteImage($image_old, $model->id, 'project');

                } else {

                    $model->image = $image_old;

                }

                $file = UploadedFile::getInstance($model, 'file');

                if($file){
                    $model->file = StaticFunctions::saveFile($file,$model->id,'project');
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

    public function actionDeleteFile($id)
    {
        $model = $this->findModel($id);
        StaticFunctions::deleteFile($model->file, $model->id, 'project');
        $model->file = NULL;
        if($model->save()){

            return $this->referrer();

        }else{
            print_r($model->errors);
        }
    }


    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
