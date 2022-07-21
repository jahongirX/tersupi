<div class="col-lg-4 col-xl-3">
    <!-- Sidebar Widget Start -->
    <div class="sidebar-widget-weap-02 ps-xl-6">

        <!-- Sidebar Widget Start -->
        <div class="sidebar-widget-02">
            <h4 class="sidebar-widget-02__title"><?=Yii::t('main','resources')?></h4>

            <?php if(!empty($categories)): ?>

                <!-- Sidebar Widget Search Start -->
                <ul class="sidebar-widget-02__link resources">
                    <?php foreach ($categories as $category): ?>
                        <?php if($category->getLang('id')): ?>
                            <li><a href="<?=\yii\helpers\Url::to(['resource/category','id' => $category->id])?>"><?=$category->getLang('name')?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                <!-- Sidebar Widget Search End -->

            <?php endif; ?>

        </div>
        <!-- Sidebar Widget End -->

        <!-- Sidebar Widget Start -->
        <div class="sidebar-widget-02">
            <h4 class="sidebar-widget-02__title"><?=Yii::t('main','week-top-news')?></h4>

            <?php if(!empty($weekTopNews)): ?>

                <!-- Sidebar Widget Search Start -->
                <ul class="sidebar-widget-02__psot">

                    <?php foreach ($weekTopNews as $model): ?>

                        <?php if($model->getLang('id')): ?>

                        <?php $image = \common\components\StaticFunctions::getImage($model,'news','main_image') ?>

                            <li>
                                <div class="sidebar-widget-02__psot-item">
                                    <div class="sidebar-widget-02__psot-thumbnail ">
                                        <a href="<?=\yii\helpers\Url::to(['news/view','id' => $model->id])?>">
                                            <img src="<?=$image?>" alt="Blog" width="100" height="80">
                                        </a>
                                    </div>
                                    <div class="sidebar-widget-02__psot-info">
                                        <h5 class="sidebar-widget-02__psot-title">
                                            <a href="#"><?=$model->getLang('title')?></a></h5>
                                        <div class="blog-item-02__meta">
                                            <span class="meta-action"><i class="far fa-calendar"></i> <?=date('d-m-Y',strtotime($model->created_date))?></span>
                                            <span class="meta-action"><i class="far fa-eye"></i> <?=$model->seen_count?></span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        <?php endif; ?>

                    <?php endforeach; ?>

                </ul>
                <!-- Sidebar Widget Search End -->

            <?php endif; ?>

        </div>
        <!-- Sidebar Widget End -->

    </div>
    <!-- Sidebar Widget End -->
</div>