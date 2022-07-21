<?php

use yii\widgets\LinkPager;

$this->title = \common\components\StaticFunctions::getSettings('title') . " - " .Yii::t('main', 'documents');

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
                <h2 class="page-banner__main-title card p-5"><?=Yii::t('main','documents')?></h2>
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
                <li class="breadcrumb-item active"><?=Yii::t('main','documents')?></li>
            </ul>
        </div>
        <!-- Page Breadcrumb End -->

        <div class="row gy-10">

            <div class="col-lg-4 col-xl-3">
                <!-- Sidebar Widget Start -->
                <div class="sidebar-widget-weap-02 ps-xl-6">

                    <!-- Sidebar Widget Start -->
                    <div class="sidebar-widget-02">

                        <h4 class="sidebar-widget-02__title"><?=Yii::t('main','categories')?></h4>

                        <?php if(!empty($categories)): ?>

                            <!-- Sidebar Widget Search Start -->
                            <ul class="sidebar-widget-02__link resources">
                                <?php foreach ($categories as $category): ?>
                                    <?php if(!empty($category->getLang('id'))): ?>
                                        <li><a href="<?=\yii\helpers\Url::to(['documents/category','id' => $category->id])?>"><?=$category->getLang('name')?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                            <!-- Sidebar Widget Search End -->

                        <?php endif; ?>

                    </div>

                </div>

            </div>

            <div class="col-lg-8 col-xl-9">

                <?php if(!empty($models)): ?>

                    <?php foreach ($models as $model): ?>

                        <?php if($model->getLang('id')): ?>

                            <div class="dashboard-courses">

                                <!-- Dashboard Course Item Start -->
                                <div class="dashboard-courses__item">
                                    <div class="dashboard-courses__thumbnail">
                                        <a href="#"><img src="/images/doc.jpg" alt="Courses" width="260" height="174"></a>
                                    </div>
                                    <div class="dashboard-courses__content">

                                        <h3 class="dashboard-courses__title"><?=$model->getLang('name')?></h3>
                                        <?php if($model->file): ?>
                                        <ul class="dashboard-courses__meta">
                                            <li>
                                                <span class="meta-label">Format:</span>
                                                <span class="meta-value"><?=\common\components\StaticFunctions::getFileFormat($model->file)?></span>
                                            </li>
                                            <?php if($model->file_size): ?>
                                            <li>
                                                <span class="meta-label">Hajmi:</span>
                                                <span class="meta-value"><?=floor($model->file_size / 1024)?> KB</span>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                        <?php endif; ?>
                                        <div class="dashboard-courses__footer">
                                            <div class="dashboard-courses__action">
                                                <?php if($model->file): ?>
                                                    <a class="action" target="_blank" download href="<?=\common\components\StaticFunctions::getFile($model,'document','file')?>"><i class="fal fa-download"></i> Yuklab olish</a>
                                                <?php endif;?>

                                                <a class="action delete" href="<?=$model->link?>"><i class="fal fa-link"></i> Lex.uz manba</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Dashboard Course Item End -->

                            </div>

                        <?php endif; ?>

                    <?php endforeach; ?>

                    <!-- Page Pagination Start -->
                    <div class="page-pagination">
                        <?php echo LinkPager::widget(['pagination' => $pagination]);?>
                    </div>
                    <!-- Page Pagination End -->

                <?php else: ?>

                    <div class="alert alert-warning">
                        <?=Yii::t('main','no-data')?>
                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</div>



