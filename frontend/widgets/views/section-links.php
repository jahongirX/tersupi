<!-- Foydali manzillar -->
<div class="edumall-box-section section-padding-01 useful_links">
    <div class="container">

        <!-- Section Title Start -->
        <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="section-title__title-03"><?=Yii::t('main','section-links-title')?></h2>
        </div>
        <!-- Section Title End -->
        <?php if(!empty($models)): ?>
            <div class="row">
                <?php foreach ($models as $model): ?>
                    <?php if($model->getLang('id')): ?>
                        <?php $image = \common\components\StaticFunctions::getImage($model,'partner','image') ?>
                        <div class="col-lg-3 col-sm-6">
                            <!-- Edumall Box Item Start -->
                            <div class="edumall-box-item-02 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                <a class="edumall-box-item-02__link" href="<?=$model->link?>" target="_blank">
                                    <div class="edumall-box-item-02__icon">
                                        <img src="<?=$image?>" alt="Icon">
                                    </div>
                                    <div class="edumall-box-item-02__content">
                                        <h3 class="edumall-box-item-02__title"><?=$model->getLang('title')?></h3>
                                    </div>
                                </a>
                            </div>
                            <!-- Edumall Box Item Start -->
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</div>
<!-- Foydali manzillar end -->