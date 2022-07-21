<?php

namespace frontend\controllers;

use common\components\Controller;
use common\models\News;
use common\models\Page;

class PageController extends Controller
{
    public function actionView($id) {

        $model = Page::findOne($id);

        if( $model )
        {
            $model->seen_count ++;
            $model->save();

            return $this->render('view', [
                'model' => $model
            ]);
        }

        return $this->referrer();

    }
}