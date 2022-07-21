<?php


namespace frontend\widgets;


use common\models\Image;
use yii\base\Widget;

class SectionGallery extends Widget
{
    public function run()
    {
        $models = Image::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(8)->all();
        return $this->render('section-gallery',compact('models'));
    }
}