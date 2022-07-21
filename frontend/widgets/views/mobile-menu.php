<?php

use common\models\Menu;

function renderMobileMenu($id){

    $out = '';
    $menu = Menu::find()->where('status=1')->andWhere(['id' => $id, 'type' => 0])->one();
    $_query = Menu::find()->where('status=1')->andWhere(['parent' => $id, 'type' => 0]);

    if( $_query->exists() )
    {
        $out .= '<li class="menu-item-has-children"><a href="#"> <span>';
        $out .= $menu->title . '</span></a>';
        $out .= '<ul class="sub-menu">';
        $items = $_query->orderBy(['order_by' => SORT_ASC])->all();
        foreach ($items as $item){
            $out .= renderMobileMenu($item->id);
        }

        $out .= '</ul></li>';

    } else {

        $out .= '<li><a href="' .$menu->url. '">';
        $out .= $menu->title.'</a></li>';

    }


    return $out;
}

$lang = Yii::$app->session->get('lang');
if (empty($lang)){
    $lang = Yii::$app->language;
}

?>
<!-- Offcanvas Start -->
<div class="offcanvas offcanvas-end offcanvas-mobile" id="offcanvasMobileMenu" style="background-image: url(assets/images/mobile-bg.jpg);">
    <div class="offcanvas-header bg-white">
        <div class="offcanvas-logo">
            <a class="offcanvas-logo__logo" href="#">
                <img src="/images/logo.png" alt="Logo">
                <span><?=\common\components\StaticFunctions::getSettings('title')?></span>
            </a>
        </div>
        <button type="button" class="offcanvas-close" data-bs-dismiss="offcanvas"><i class="fal fa-times"></i></button>
    </div>

    <div class="offcanvas-body">
        <nav class="canvas-menu">
            <ul class="offcanvas-menu">

                <?php

                foreach ($models as $model) {

                    echo renderMobileMenu( $model->id );

                }

                ?>

            </ul>
        </nav>
    </div>

    <!-- Header User Button Start -->
    <div class="offcanvas-body mobile_info">

        <ul class="header-top-bar-wrap__info-list header-top-bar-wrap__info-list-02">
            <li><a href="tel:<?=\common\components\StaticFunctions::getSettings('phone')?>"><i class="fas fa-phone"></i> <span class="info-text"><?=\common\components\StaticFunctions::getSettings('phone')?></span></a></li>
            <li><a href="mailto:<?=\common\components\StaticFunctions::getSettings('mail')?>"><i class="far fa-envelope"></i> <span class="info-text"><?=\common\components\StaticFunctions::getSettings('mail')?></span></a></li>
        </ul>

        <ul class="header-top-bar-wrap__info-list header-top-bar-wrap__info-list-02 d-lg-flex">

            <li>
                <a class="facebook" href="<?=\common\components\StaticFunctions::getSettings('facebook')?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
            </li>

            <li>
                <a class="youtube" href="<?=\common\components\StaticFunctions::getSettings('youtube')?>" target="_blank"><i class="fab fa-youtube"></i></a>
            </li>

            <li>
                <a class="telegram" href="<?=\common\components\StaticFunctions::getSettings('telegram')?>" target="_blank"><i class="fab fa-telegram"></i></a>
            </li>
        </ul>

        <ul class="languages">
           <?php foreach ($langs as $language): ?>
               <li><a href="<?=\yii\helpers\Url::to(['site/lang','lang'=>$language->abb ])?>"><?=$language->abb?></a></li>
           <?php endforeach; ?>
        </ul>

    </div>
    <!-- Header User Button End -->

</div>
<!-- Offcanvas End -->