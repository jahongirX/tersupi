<!-- Categories Section Start -->
<div class="categories-section section-padding-01">
    <div class="container">

        <!-- Section Title Start -->
        <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="section-title__title"><?=Yii::t('main','section-services-title')?> </h2>
        </div>
        <!-- Section Title End -->

        <div class="row g-6">

            <?php if(!empty($models)): ?>

                <?php foreach ($models as $model): ?>

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <!-- categories Item Start -->
                        <div class="categories-item" data-aos="fade-up" data-aos-duration="1000">
                            <a class="categories-item__link" href="<?=$model->link?>">
                                <div class="categories-item__icon">
                                    <i class="<?=$model->image?>"></i>
                                </div>
                                <div class="categories-item__info">
                                    <h3 class="categories-item__name">
                                        <?=$model->getLang('title')?>
                                    </h3>
                                </div>
                            </a>
                        </div>
                        <!-- categories Item End -->
                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </div>
</div>
<!-- Categories Section End -->