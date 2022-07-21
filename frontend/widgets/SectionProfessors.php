<?php


namespace frontend\widgets;


use common\models\Post;
use common\models\Resource;
use yii\base\Widget;

class SectionProfessors extends Widget
{
    public function run()
    {
        $models = Resource::find()->where(['status' => 1, 'category_id' => 6])->all();
        return $this->render('section-professors',compact('models'));
    }
}