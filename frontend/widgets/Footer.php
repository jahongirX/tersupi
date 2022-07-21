<?php

namespace frontend\widgets;

use yii\base\Widget;
use common\models\Menu;

class Footer extends Widget {

    public function run()
    {
//        $models = Menu::find()->where('status=1')->andWhere(['parent' => NULL,'type' => Menu::FOOTER])->orderBy(['order_by' => SORT_ASC])->all();
        $models = \common\models\News::find()->where(['status'=>1])->orderBy(['id'=>SORT_DESC])->limit(3)->all();
        return $this->render('footer', [
            'models' => $models
        ]);
    }

}
