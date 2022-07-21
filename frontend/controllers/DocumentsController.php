<?php

namespace frontend\controllers;

use common\components\Controller;
use common\models\Document;
use common\models\DocumentCategory;
use common\models\News;
use common\models\NewsCategory;
use common\models\NewsLang;
use common\models\Languages;
use common\models\Project;
use common\models\ProjectCategory;
use Yii;
use yii\data\ActiveDataProvider;

class DocumentsController extends Controller {

    public function actionCategory($id)
    {

        $categories = DocumentCategory::find()->where(['status' => 1])->all();
        if($category = DocumentCategory::findOne($id))
        {

            $models = Document::find()->where( 'status=1 AND category=' . $id )->orderBy(['id' => SORT_DESC]);

            $pagination = new \yii\data\Pagination([
                'totalCount' => $models->count(),
                'pageSize' => 12,
            ]);

            $models = $models->offset($pagination->offset)->limit($pagination->pageSize)->all();

            return $this->render('category', [
                'category' => $category,
                'models' => $models,
                'pagination' => $pagination,
                'categories' => $categories
            ]);

        }

        return $this->referrer();

    }

    public function actionViewAll() {

        $categories = DocumentCategory::find()->where(['status' => 1])->all();
        if(Yii::$app->language == Yii::$app->params['main_language'])
        {
            $models = Document::find()->where('status=1')->orderBy(['created_date' => SORT_DESC]);

        } else {

            $lang = Yii::$app->language;
            $id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
            $models = Document::find()->leftJoin('document_lang', 'document.id=document_lang.parent')->where('document_lang.lang=' . $id)->orderBy(['id' => SORT_DESC]);

        }

        $pagination = new \yii\data\Pagination([
            'totalCount' => $models->count(),
            'pageSize' => 10
        ]);

        $models = $models->offset($pagination->offset)->limit($pagination->pageSize)->all();

        return $this->render('view-all', [
            'models' => $models,
            'pagination' => $pagination,
            'categories' => $categories
        ]);
    }

}
