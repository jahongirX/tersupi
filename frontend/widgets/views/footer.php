<?php
use common\models\Menu;

function renderFooterMenu($id)
{

    $out = '';

    //$menu = Menu::find()->where('status=1')->andWhere(['id' => $id, 'type' => 0])->one();
    $menus = Menu::find()->where('status=1')->andWhere(['type'=>1])->andWhere(['id' => $id])->all();

    foreach ($menus as $menu) {
        $out .= '<li>';
        $out .= '<a href="' . $menu->url . '">' . $menu->title . '</a>';

        if ($menu->type)

            $out .= '</li>';
    }

    return $out;
}

 ?>

<div class="footer-section bg-color-10">

    <!-- Footer Widget Area Start -->
    <div class="footer-widget-area section-padding-01">
        <div class="container">
            <div class="row gy-6">

                <div class="col-md-4">
                    <!-- Footer Widget Start -->
                    <div class="footer-widget">
                        <a href="#" class="footer-widget__logo">
                            <img src="/images/logo.png" alt="Logo">
                            <span> <?=\common\components\StaticFunctions::getSettings('title')?> </span>
                        </a>


                        <div class="footer-widget__info">
                            <p class="mb-3"><?=\common\components\StaticFunctions::getSettings('mail-index')?></p>
                            <p class="mb-3"><?=\common\components\StaticFunctions::getSettings('transport-list')?></p>
                            <p><?=\common\components\StaticFunctions::getSettings('author-requirement')?></p>
                        </div>


                    </div>
                    <!-- Footer Widget End -->
                </div>

                <div class="col-md-8">
                    <div class="row gy-6">

                        <div class="col-sm-8">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <h4 class="footer-widget__title"><?=Yii::t('main','how-to-get')?></h4>
                                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A2a2641113cbfd3905ef7e0a70cf345c264fb87fd976d7b84c7f08c0902a5737f&amp;width=100%&amp;height=381&amp;lang=ru_RU&amp;scroll=true"></script>
                            </div>
                            <!-- Footer Widget End -->
                        </div>
                        <div class="col-sm-4">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget">

                                <div class="footer-widget__info">
                                    <span class="title"><?=Yii::t('main','address')?></span>
                                    <span class="number"><a href="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A2a2641113cbfd3905ef7e0a70cf345c264fb87fd976d7b84c7f08c0902a5737f&amp;width=100%&amp;height=381&amp;lang=ru_RU&amp;scroll=true" target="_blank"><?=\common\components\StaticFunctions::getSettings('address_footer')?></a></span>
                                </div>

                                <div class="footer-widget__info">
                                    <span class="title"><?=Yii::t('main','call-center')?></span>
                                    <span class="number"><a href="tel:<?=\common\components\StaticFunctions::getSettings('phone')?>"><?=\common\components\StaticFunctions::getSettings('phone')?></a></span>
                                </div>

                                <div class="footer-widget__info">
                                    <span class="title">E-mail</span>
                                    <span class="number"><a href="mailto:<?=\common\components\StaticFunctions::getSettings('mail')?>"><?=\common\components\StaticFunctions::getSettings('mail')?></a></span>
                                </div>

                                <div class="footer-widget__social-02">
                                    <a class="facebook" href="<?=\common\components\StaticFunctions::getSettings('facebook')?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a class="youtube" href="<?=\common\components\StaticFunctions::getSettings('youtube')?>" target="_blank"><i class="fab fa-youtube"></i></a>
                                    <a class="telegram" href="<?=\common\components\StaticFunctions::getSettings('telegram')?>" target="_blank"><i class="fab fa-telegram"></i></a>
                                </div>


                            </div>
                            <!-- Footer Widget End -->
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer Widget Area End -->

    <!-- Footer Copyright Area End -->
    <div class="footer-copyright">
        <div class="container">
            <div class="copyright-wrapper text-center">

                <p class="footer-widget__copyright mt-0"> <?=\common\components\StaticFunctions::getSettings('copyright')?></p>
            </div>
        </div>
    </div>
    <!-- Footer Copyright Area End -->

</div>