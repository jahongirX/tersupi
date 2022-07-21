<!-- Professor teachers Start -->
<div class="event-section section-padding-01">
    <div class="container">

        <!-- Section Title Start -->
        <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="section-title__title-03"><?=Yii::t('main','section-professors-title')?></h2>
        </div>
        <!-- Section Title End -->

        <?php if(!empty($models)): ?>
        <!-- Event Active Start -->
        <div class="event-active swiper-button-style" data-aos="fade-up" data-aos-duration="1000">
            <div class="swiper">
                <div class="swiper-wrapper">

                    <?php foreach ($models as $model): ?>

                        <?php if($model->getLang('id')): ?>

                        <?php $image = \common\components\StaticFunctions::getImage($model,'resource','image') ?>

                            <div class="swiper-slide">
                                <!-- Event Item Start -->
                                <div class="event-item">
                                    <div class="event-item__image">
                                        <a href="#"><img src="<?=$image?>" alt="professor" height="209"></a>
                                    </div>
                                    <div class="event-item__content text-center">
                                        <h3 class="event-item__title"><a href="<?=\yii\helpers\Url::to(['resource/view','id' => $model->id])?>"><?=$model->getLang('title')?></a></h3>
                                    </div>
                                </div>
                                <!-- Event Item End -->
                            </div>

                        <?php endif; ?>

                    <?php endforeach; ?>

                </div>
            </div>

            <div class="swiper-button-next"><i class="fal fa-angle-right"></i></div>
            <div class="swiper-button-prev"><i class="fal fa-angle-left"></i></div>
        </div>
        <!-- Event Active End -->

        <?php endif; ?>

    </div>
</div>
<!-- Professor teachers End -->