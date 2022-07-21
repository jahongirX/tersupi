<?php


namespace frontend\widgets;


use common\models\News;
use yii\base\Widget;

class SectionNews extends Widget
{
    public function run()
    {
        $models = News::find()->where(['status'=>1])->andWhere(['!=','category',2])->orderBy(['created_date'=>SORT_DESC])->limit(9)->all();
        $announcements = News::find()->where(['status'=>1, 'category' => 2])->orderBy(['created_date'=>SORT_DESC])->limit(6)->all();
        return $this->render('section-news',compact('models','announcements'));
    }
}