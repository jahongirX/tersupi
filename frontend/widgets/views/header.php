<?php

use common\models\Menu;

function renderMenu($id){

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
            $out .= renderMenu($item->id);
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

<!-- Header start -->
<div class="header-section header-sticky">

    <!-- Header Top Start -->
    <div class="header-top-03 d-none d-sm-block">
        <div class="container">

            <!-- Header Top Bar Wrapper Start -->
            <div class="header-top-bar-wrap d-sm-flex justify-content-between">

                <div class="header-top-bar-wrap__info">
                    <ul class="header-top-bar-wrap__info-list header-top-bar-wrap__info-list-02">
                        <li><a href="tel:<?=\common\components\StaticFunctions::getSettings('phone')?>"><i class="fas fa-phone"></i> <span class="info-text"><?=\common\components\StaticFunctions::getSettings('phone')?></span></a></li>
                        <li><a href="mailto:<?=\common\components\StaticFunctions::getSettings('mail')?>"><i class="far fa-envelope"></i> <span class="info-text"><?=\common\components\StaticFunctions::getSettings('mail')?></span></a></li>
                    </ul>
                </div>

                <div class="header-top-bar-wrap__info ">
                    <ul class="header-top-bar-wrap__info-list header-top-bar-wrap__info-list-02 govern_emblems">
                        <li>
                            <a href="<?=\yii\helpers\Url::to(['/page/view/3'])?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="O'zbekiston Respublikasi Davlat Gerbi">
                                <img src="/images/gerb-small.png" alt="">
                            </a>
                        </li>

                        <li>
                            <a href="<?=\yii\helpers\Url::to(['/page/view/2'])?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="O'zbekiston Respublikasi Davlat Bayrog'i">
                                <img src="/images/flag.png" alt="">
                            </a>
                        </li>

                        <li>
                            <a href="<?=\yii\helpers\Url::to(['/page/view/4'])?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="O'zbekiston Respublikasi Davlat Madhiyasi">
                                <img src="/images/gerb-small.png" alt="">
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="header-top-bar-wrap__info d-sm-flex">

                    <ul class="header-top-bar-wrap__info-list header-top-bar-wrap__info-list-02 d-none d-lg-flex">

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


                </div>

                <div class="header-top-bar-wrap__info d-sm-flex">

                    <ul class="header-top-bar-wrap__info-list header-top-bar-wrap__info-list-02 d-lg-flex">

                        <li class="header-top-bar-wrap__language header-top-bar-wrap__language-02">
                            <a class="language-toggle" href="#"><i class="fas fa-eye"></i></a>
                            <ul class="language-dropdown">
                                <div class="apperance-item" >
                                    <div class="special-title"><?=Yii::t('main','disabled')?></div>
                                    <div class="app-item-stat">
                                        <div class="btn btn-secondary normal" data-name="normal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Oddiy ko'rinish" > A </div>
                                        <div class="btn btn-secondary white-black" data-name="blackAndWhite" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Oq-qora" > A </div>
                                        <div class="btn btn-secondary black" data-name="blackAndWhiteInvert" data-bs-toggle="tooltip" data-bs-placement="bottom"title="Qoraytirilgan"> A </div>
                                        <div class="btn btn-secondary no-photo" data-name="photo-control bg-control" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Rasmlarsiz"> <i class="fa fa-images"></i> <i class="fa-solid fa-image-slash"></i> </div>
                                    </div>
                                    <div class="apperance-item">
                                        <div class="special-title" ><?=Yii::t('main','font-size')?></div>
                                        <div class="app-item-stat" >
                                            <input type="range" min="0" max="100" value="0" step="10" class="slider" id="fontRange">
                                        </div>
                                    </div>
                                </div>

                            </ul>
                        </li>

                        <li>
                            <a href="#" onclick="window.open('/','mywin',`width=420,height=650`);return false;">
                                <i class="fas fa-mobile-alt"></i>
                            </a>
                        </li>

                        <li>
                            <a href="<?=\yii\helpers\Url::to(['site/sitemap'])?>">
                                <i class="fas fa-sitemap"></i>
                            </a>
                        </li>
                    </ul>


                    <div class="header-top-bar-wrap__language">

                        <ul class="header-top-bar-wrap__info-list header-top-bar-wrap__info-list-02 d-none d-lg-flex">
                            <?php foreach ($langs as $language): ?>
                                <li><a href="<?=\yii\helpers\Url::to(['site/lang','lang'=>$language->abb ])?>"><img src="/images/<?=$language->abb?>.png" alt=""> <?=$language->abb?></a></li>
                            <?php endforeach; ?>
                        </ul>

                    </div>


                </div>

            </div>
            <!-- Header Top Bar Wrapper End -->

        </div>
    </div>
    <!-- Header Top End -->

    <!-- Header Main Start -->
    <div class="header-main-02">
        <div class="container">
            <!-- Header Main Wrapper Start -->
            <div class="header-main-wrapper">

                <!-- Header Logo Start -->
                <div class="header-logo">
                    <a class="header-logo__logo" href="<?=\yii\helpers\Url::home()?>">
                        <img src="/images/logo.png" alt="Logo">
                        <span> <?=\common\components\StaticFunctions::getSettings('title')?> </span>
                    </a>
                </div>
                <!-- Header Logo End -->

                <!-- Header Inner Start -->
                <div class="header-inner justify-content-between">

                    <!-- Header Navigation Start -->
                    <div class="header-navigation d-none d-xl-block">
                        <nav class="menu-primary">
                            <ul class="menu-primary__container">

                                <?php

                                foreach ($models as $model) {

                                    echo renderMenu( $model->id );

                                }

                                ?>

                            </ul>
                        </nav>
                    </div>
                    <!-- Header Navigation End -->

                    <!-- Header Mobile Toggle Start -->
                    <div class="header-toggle header-toggle-02 order-md-4">
                        <button class="header-toggle__btn d-xl-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMobileMenu">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </button>
                    </div>
                    <!-- Header Mobile Toggle End -->

                </div>
                <!-- Header Inner End -->

            </div>
            <!-- Header Main Wrapper End -->
        </div>
    </div>
    <!-- Header Main End -->

</div>
<!-- Header End -->
