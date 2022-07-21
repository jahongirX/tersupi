<?php

use yii\widgets\LinkPager;

$this->title = \common\models\Settings::findOne('title')->getLang('val') . " - ". Yii::t('main','Albums') . " - " . $album->getLang('name');

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
                <h2 class="page-banner__main-title card p-5"><?=$album->getLang('name')?></h2>
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
                <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::to(['/album'])?>"><?=Yii::t('main','albums')?></a></li>
                <li class="breadcrumb-item active"><?=$album->getLang('name')?></li>
            </ul>
        </div>
        <!-- Page Breadcrumb End -->

        <div class="row gy-10">
            <div class="col-lg-8 col-xl-9">

                <div class="blog-details">

                    <div class="blog-details__content">

                        <div class="blog-details__meta">
                            <span class="meta-action"><i class="far fa-calendar"></i> <span class="meta-action__value"><?=date("d-m-Y",strtotime($album->created_date))?></span></span>
                            <span class="meta-action"><i class="far fa-eye"></i> <span class="meta-action__value"><?=$album->seen_count?> </span></span>
                        </div>

                        <div class="post_detail mb-5">
                            <?=\common\components\StaticFunctions::kcfinder($album->getLang('description'))?>
                        </div>

                        <div class="album_images row">
                            <?php

                            foreach($models as $model):


                                if($model->guid && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'album/' . $model->album . '/m_' . $model->guid ))
                                {
                                    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'album/' . $model->album . '/l_' . $model->guid;

                                } else {

                                    $image = '/images/default/l_post.jpg';

                                }

                                ?>

                                <div class="col-3 col-md-3">

                                    <a href="<?=$image?>" class="glightbox">

                                        <img src="<?=$image?>" alt="">

                                    </a>
                                </div>


                            <?php

                            endforeach;

                            ?>

                        </div>

                        <!-- Page Pagination Start -->
                        <div class="page-pagination">
                            <?php echo LinkPager::widget(['pagination' => $pagination]);?>
                        </div>
                        <!-- Page Pagination End -->

                    </div>

                </div>

            </div>

            <?=\frontend\widgets\Sidebar::widget()?>

        </div>
    </div>
</div>
<!-- Blog End -->
