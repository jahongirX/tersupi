<?php

use yii\widgets\LinkPager;

$this->title = \common\components\StaticFunctions::getSettings('title') . " - " . Yii::t('main','all-news');


$this->registerMetatag([
    'property' => 'og:description',
    'content' => $this->title
]);


?>

<!-- Page Banner Section Start -->
<div class="page-banner bg-color-05">
    <div class="page-banner__wrapper">
        <div class="container">

            <!-- Page Banner Caption Start -->
            <div class="page-banner__caption text-center">
                <h2 class="page-banner__main-title card p-5"><?=Yii::t('main','all-news')?></h2>
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
                <li class="breadcrumb-item active"><?=Yii::t('main','all-news')?></li>
            </ul>
        </div>
        <!-- Page Breadcrumb End -->

        <div class="row gy-10">
            <div class="col-lg-8 col-xl-9">

                <div class="row gy-6">
                    <?php if(!empty($models)): ?>
                        <?php foreach ($models as $model): ?>

                            <?php if($model->getLang('id')): ?>

                                <?php $image = \common\components\StaticFunctions::getImage($model,'news','main_image'); ?>

                                <div class="col-md-6 col-xl-4 mb-5">

                                    <!-- Blog Item Start -->
                                    <div class="blog-item-02" data-aos="fade-up" data-aos-duration="1000">
                                        <div class="blog-item-02__image">
                                            <a href="<?=\yii\helpers\Url::to(['news/view','id' => $model->id])?>"><img src="<?=$image?>" alt="Blog" width="370" height="201"></a>
                                        </div>
                                        <div class="blog-item-02__content">
                                            <div class="blog-item-02__meta">
                                                <span class="meta-action"><i class="far fa-calendar"></i> <?=date('d-m-Y',strtotime($model->created_date))?></span>
                                                <span class="meta-action"><i class="far fa-eye"></i> <?=$model->seen_count?></span>
                                            </div>
                                            <h3 class="blog-item-02__title"><a href="<?=\yii\helpers\Url::to(['news/view','id' => $model->id])?>"><?=$model->getLang('title')?></a></h3>

                                            <a class="blog-item-02__more btn btn-light btn-hover-white" href="<?=\yii\helpers\Url::to(['news/view','id' => $model->id])?>"><?=Yii::t('main','read-more')?> <i class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- Blog Item End -->

                                </div>

                            <?php endif; ?>

                        <?php endforeach; ?>
                    <?php endif;?>
                </div>



                <!-- Page Pagination Start -->
                <div class="page-pagination">
                    <?php echo LinkPager::widget(['pagination' => $pagination]);?>
                </div>
                <!-- Page Pagination End -->

            </div>

            <?=\frontend\widgets\Sidebar::widget()?>
        </div>
    </div>
</div>
<!-- Blog End -->
