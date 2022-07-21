<?php

namespace frontend\widgets;

use common\components\StaticFunctions;
use common\models\Languages;
use common\models\Menu;
use common\models\NewsCategory;
use common\models\SearchForm;
use common\models\SiteUser;
use Yii;
use yii\base\Widget;

class Header extends Widget {

    public function run()
    {
        $models = Menu::find()->where('status=1')->andWhere(['parent' => NULL,'type' => Menu::HEADER])->orderBy(['order_by' => SORT_ASC])->all();
        $langs = Languages::find()->all();


        return $this->render('header', [
            'langs' => $langs,
            'models' => $models,
        ]);
    }

}