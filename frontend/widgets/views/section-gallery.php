<!-- Galereya -->
<div class="edumall-box-section section-padding-01 gallery">

    <!-- Section Title Start -->
    <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="section-title__title-03"> <?=Yii::t('main','section-gallery-title')?> </h2>
    </div>
    <!-- Section Title End -->
    <?php if(!empty($models)): ?>



            <div class="row g-0">

                <?php foreach ($models as $model): ?>

                    <?php $image = \common\components\StaticFunctions::getImage($model,'album','guid') ?>

                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="<?=$image?>" class="glightbox">
                            <img src="<?=$image?>" alt="">
                        </a>
                    </div>

                <?php endforeach; ?>

            </div>



    <?php endif; ?>

</div>

<!-- Galereya End -->