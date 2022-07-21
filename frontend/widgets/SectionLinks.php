<?php


namespace frontend\widgets;


use common\models\Partner;
use yii\base\Widget;

class SectionLinks extends Widget
{
    public function run()
    {
        $models = Partner::find()->where(['status' => 1])->all();
        return $this->render('section-links', compact('models'));
    }
}