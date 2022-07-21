<?php


namespace frontend\widgets;


use yii\base\Widget;

class SectionCounter extends Widget
{
    public function run()
    {
        return $this->render('section-counter');
    }
}