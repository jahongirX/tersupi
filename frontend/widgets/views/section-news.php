<!-- Blog Start -->
<div class="blog-section section-padding-01 news_section">
    <div class="container">

        <div class="py-5 mb-5">
            <a href="/page/view/7" class="btn btn-primary w-100">Qabul 2022</a>
        </div>

        <!-- Section Title Start -->
        <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="section-title__title"><?=Yii::t('main','section-news-title')?> </h2>
        </div>
        <!-- Section Title End -->

        <div class="row">

            <div class="col-lg-9">

                <div class="row">

                    <?php if(!empty($models)): ?>

                        <?php foreach ($models as $model): ?>

                            <?php if($model->getLang('id')): ?>

                                <?php $image = \common\components\StaticFunctions::getImage($model,'news','main_image') ?>

                                <div class="col-xl-4 col-md-6 mb-5">

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

                    <?php endif; ?>

                    <div class="col-xl-12 grid-item text-center">
                        <a href="<?=\yii\helpers\Url::to(['news/view-all'])?>" class="banner-caption__btn btn btn-primary btn-hover-secondary"><?=Yii::t('main','all-news')?></a>
                    </div>

                </div>

            </div>

            <div class="col-lg-3">

                <div class="sidebar-widget-02">
                    <h4 class="sidebar-widget-02__title">E'lonlar</h4>

                    <!-- Sidebar Widget Search Start -->
                    <ul class="sidebar-widget-02__psot">
                        <?php if(!empty($announcements)): ?>

                            <?php foreach ($announcements as $model): ?>

                                <?php if($model->getLang('id')): ?>

                                    <?php $image = \common\components\StaticFunctions::getImage($model,'news','main_image') ?>

                                        <li>
                                            <div class="sidebar-widget-02__psot-item">
                                                <div class="sidebar-widget-02__psot-thumbnail ">
                                                    <a href="<?=\yii\helpers\Url::to(['news/view','id' => $model->id])?>">
                                                        <img src="<?=$image?>" alt="Blog" width="100" height="80">
                                                    </a>
                                                    <span class="sidebar-widget-02__psot-date"> <span> <i class="far fa-calendar"></i> <?=date('d-m-Y',strtotime($model->created_date))?> </span> <span><i class="far fa-eye"></i> <?=$model->seen_count?></span> </span>
                                                </div>
                                                <div class="sidebar-widget-02__psot-info">
                                                    <h5 class="sidebar-widget-02__psot-title"><a href="<?=\yii\helpers\Url::to(['news/view','id' => $model->id])?>"><?=$model->getLang('title')?></a></h5>
                                                </div>
                                            </div>
                                        </li>

                                <?php endif; ?>

                            <?php endforeach; ?>

                        <?php endif; ?>

                        <li>
                            <a href="<?=\yii\helpers\Url::to(['news/category','id' => 2])?>" class="banner-caption__btn btn btn-primary btn-hover-secondary w-100"><?= Yii::t('main','all-announcements')?></a>
                        </li>
                    </ul>
                    <!-- Sidebar Widget Search End -->
                </div>

            </div>

        </div>

    </div>
</div>
<!-- Blog End -->