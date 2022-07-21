<?php


namespace frontend\controllers;


use common\components\Controller;
use common\models\Resource;
use common\models\ResourceCategory;

class ResourceController extends Controller
{
    public function actionCategory($id){

        $category = ResourceCategory::findOne($id);
        if(empty($category)){
            return $this->goBack();
        }

        $models = Resource::find()->where(['status' => 1, 'category_id' => $id]);

        $pagination = new \yii\data\Pagination([
            'totalCount' => $models->count(),
            'pageSize' => 12,
        ]);

        $models = $models->offset($pagination->offset)->limit($pagination->pageSize)->all();

        return $this->render('category', compact('models','category','pagination'));
    }

    public function actionView($id){
        $model = Resource::findOne($id);

        if( $model )
        {
            $model->seen_count ++;
            $model->save();


            return $this->render('view', [
                'model' => $model
            ]);
        }
    }
}