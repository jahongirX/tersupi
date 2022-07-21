<?php


namespace frontend\widgets;


use common\models\Services;
use yii\base\Widget;

class SectionServices extends Widget
{
    public function run()
    {
        $models = Services::find()->where(['status' => 1])->all();
        return $this->render('section-services',compact('models'));
    }
}