<?php


namespace frontend\widgets;


use common\models\News;
use common\models\ResourceCategory;
use yii\base\Widget;
use yii\db\Expression;

class Sidebar extends Widget
{
    public function run()
    {
        $categories = ResourceCategory::find()->where(['status' => 1])->orderBy(['order_by' => SORT_ASC])->all();
        $weekTopNews = News::find()->where(['status' => 1])->andWhere(['>', 'created_date', new Expression('DATE_SUB(NOW(), INTERVAL 1 WEEK)')])->orderBy(['seen_count' => SORT_DESC])->all();
        return $this->render('sidebar',compact('categories','weekTopNews'));
    }
}