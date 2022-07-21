<?php


namespace frontend\widgets;


use common\models\Slider;
use yii\base\Widget;

class SectionSlider extends Widget
{
    public function run(){
        $models = Slider::find()->where(['status' => 1])->limit(9)->all();
        return $this->render('section-slider',compact('models'));
    }
}