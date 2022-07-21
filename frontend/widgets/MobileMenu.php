<?php


namespace frontend\widgets;


use common\models\Languages;
use common\models\Menu;
use yii\base\Widget;

class MobileMenu extends Widget
{
    public function run()
    {
        $models = Menu::find()->where('status=1')->andWhere(['parent' => NULL,'type' => Menu::HEADER])->orderBy(['order_by' => SORT_ASC])->all();
        $langs = Languages::find()->all();
        return $this->render('mobile-menu',compact('models','langs'));
    }
}