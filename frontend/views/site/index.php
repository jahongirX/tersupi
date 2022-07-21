<?php

$this->title = \common\components\StaticFunctions::getSettings('title');

$this->registerMetatag([
    'property' => 'og:description',
    'content' => 'Termiz davlat universitetining Pedagogika instituti - rasmiy web sayti'
])

?>


<?= \frontend\widgets\SectionSlider::widget()?>

<?= \frontend\widgets\MobileMenu::widget()?>

<?= \frontend\widgets\SectionNews::widget()?>

<?= \frontend\widgets\SectionServices::widget()?>

<?= \frontend\widgets\SectionCounter::widget()?>

<?= \frontend\widgets\SectionProfessors::widget()?>

<?= \frontend\widgets\SectionLinks::widget()?>

<?= \frontend\widgets\SectionGallery::widget()?>