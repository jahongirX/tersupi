<?php

$this->title = \common\components\StaticFunctions::getSettings('title') . " - " . \common\models\NewsCategory::findOne($model->category)->getLang('name') . "-" . $model->getLang('title');

$image = \common\components\StaticFunctions::getImage($model,'news','main_image');

$lang = Yii::$app->session->get('lang');
if (empty($lang)) {
    $lang = Yii::$app->language;
}

$postImages = $model->getNewsGallery()['images'];

$this->registerMetatag([
    'property' => 'og:description',
    'content' => $this->title
]);

$this->registerMetatag([
    'property' => 'og:image',
    'content' => $image
])


?>

<!-- Page Banner Section Start -->
<div class="page-banner bg-color-05">
    <div class="page-banner__wrapper">
        <div class="container">

            <!-- Page Banner Caption Start -->
            <div class="page-banner__caption text-center">
                <h2 class="page-banner__main-title card p-5"><?=$model->getLang('title')?></h2>
            </div>
            <!-- Page Banner Caption End -->

        </div>
    </div>
</div>
<!-- Page Banner Section End -->

<!-- Blog Start -->
<div class="blog-section section-padding-01">
    <div class="container">

        <!-- Page Breadcrumb Start -->
        <div class="page-breadcrumb mb-15">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::Home()?>"><?=Yii::t('main','home')?></a></li>
                <li class="breadcrumb-item"><a href="<?=yii\helpers\Url::to(['news/view-all'])?>"> <?=Yii::t('main','all-news')?></a></li>
                <li class="breadcrumb-item"><a href="<?=yii\helpers\Url::to(['news/category','id' => $model->category])?>"> <?=\common\models\NewsCategory::findOne($model->category)->getLang('name')?></a></li>
                <li class="breadcrumb-item active"><?=$model->getLang('title')?></li>
            </ul>
        </div>
        <!-- Page Breadcrumb End -->

        <div class="row gy-10">
            <div class="col-lg-8 col-xl-9">

                <div class="blog-details">

                    <div class="blog-details__image">
                        <img src="<?=$image?>" alt="Blog" width="770" height="418">
                    </div>

                    <div class="blog-details__content">

                        <div class="blog-details__meta">
                            <span class="meta-action"><i class="far fa-calendar"></i> <span class="meta-action__value"><?=date("d-m-Y",strtotime($model->created_date))?></span></span>
                            <span class="meta-action"><i class="far fa-eye"></i> <span class="meta-action__value"><?=$model->seen_count?> </span></span>
                        </div>

                        <div class="post_detail mb-5">
                            <h3 class="blog-details__title"><?=$model->getLang('title')?></h3>
                            <?=\common\components\StaticFunctions::kcfinder($model->getLang('body'))?>
                        </div>
                        <?php if(!empty($postImages)): ?>
                            <div class="post_slider">
                            <div class="swiper">
                                <div class="swiper-wrapper">

                                    <?php foreach ($postImages as $pImage): ?>

                                        <?php  ?>

                                        <div class="swiper-slide">
                                            <a href="<?=$pImage?>" class="glightbox">
                                                <img src="<?=$pImage?>" alt="">
                                            </a>
                                        </div>

                                    <?php endforeach; ?>

                                </div>
                            </div>

                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        <?php endif; ?>
                    </div>

                </div>

            </div>

            <?=\frontend\widgets\Sidebar::widget()?>

        </div>
    </div>
</div>
<!-- Blog End -->
