<?php


namespace frontend\controllers;


use common\components\Controller;
use common\models\Leader;

class LeaderController extends Controller
{
    public function actionGetLeader($id){
        $model = Leader::findOne($id);

        if(empty($model)){
            return $this->goHome();
        }

        return  $this->renderAjax('get-leader',[
            'model' => $model
        ]);


    }
}