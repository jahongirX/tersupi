<!-- Slider Section Start -->
<?php if(!empty($models)): ?>
    <div class="main_slider">
        <div class="swiper">

            <div class="swiper-wrapper">
                <?php foreach ($models as $model): ?>
                    <?php $image = \common\components\StaticFunctions::getImage($model,'slider','image') ?>

                    <div class="swiper-slide" style="background-image: url(<?=$image?>)">
                    <div class="container" >
                        <!-- Slider Item Start -->

                            <div class="slider-item" >
                                <?php if(!empty($model->title)): ?>
                                    <h3><a href="<?=$model->link?>"><?=$model->title?></a></h3>
                                    <a href="<?=$model->link?>" class="banner-caption__btn btn btn-primary btn-hover-secondary">Batafsil</a>
                                <?php endif; ?>
                            </div>

                        <!-- Slider Item End -->
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="swiper-pagination"></div>

        </div>

    </div>
<?php endif; ?>
<!-- Slider Section End -->