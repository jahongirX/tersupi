<?php

namespace backend\controllers;

use common\models\News;
use common\models\NewsSearch;
use common\models\PostImage;
use Yii;
use common\components\Controller;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use common\components\StaticFunctions;
use yii\widgets\ActiveForm;
use common\models\Attach;

class
NewsController extends Controller
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
                    News::findOne($items[$i])->delete();
            }
        }

        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=Yii::$app->params['pagination'];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new News();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()))
        {
            $model->category = implode(",",$_POST['News']['category']);
            $model->creator = Yii::$app->user->id;

            if($model->save())
            {

				$image = UploadedFile::getInstance($model, 'main_image');

				if($image)
				{
					$model->main_image = StaticFunctions::saveImage($image, $model->id, 'news');
				}

                $postImages = UploadedFile::getInstances($model,'postImages');

				if($postImages){
				    foreach ($postImages as $image){
				        $imageItem = new PostImage();
				        $imageItem->post_id = $model->id;
				        $imageItem->type = 1;
				        $imageItem->image = StaticFunctions::saveImage($image,$model->id,'news');
				        $imageItem->save();
                    }
                }
				
				$model->save();
				
                return $this->redirect(['update', 'id' => $model->id]);
            } else{
                return print_r($model->errors);
            }


        } else {

            return $this->render('create', [
                'model' => $model,
            ]);

        }

    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image_old = $model->main_image;

        $postGallery = $model->getNewsGallery();



        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()))
        {

            $image = UploadedFile::getInstance($model, 'main_image');

            if($image)
            {
                $model->main_image = StaticFunctions::saveImage($image, $model->id, 'news');
                StaticFunctions::deleteImage($image_old, $model->id, 'news');

            } else {

                $model->main_image = $image_old;

            }

            $postImages = UploadedFile::getInstances($model,'postImages');

            if($postImages){
                foreach ($postImages as $image){
                    $imageItem = new PostImage();
                    $imageItem->post_id = $model->id;
                    $imageItem->type = 1;
                    $imageItem->image = StaticFunctions::saveImage($image,$model->id,'news');
                    $imageItem->save();
                }
            }



            if($model->save())
            {
                return $this->redirect(['update', 'id' => $model->id]);
            }

        } else {

            return $this->render('update', [
                'model' => $model,
                'postGallery' => $postGallery
            ]);

        }

    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDelete($id)
    {
        if (Yii::$app->request->isAjax) {
            $this->findModel($id)->delete();
        }
    }

    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDeleteImage(){
        $imageId = Yii::$app->request->post()['key'];
        PostImage::findOne($imageId)->delete();
        return true;
    }

    public function actionDeleteNewsImage($id){
        $model = $this->findModel($id);
        StaticFunctions::deleteImage($model->main_image,$model->id,'news');
        $model->main_image = '';
        $model->save();
        return $this->redirect(['update','id' => $model->id]);
    }
}