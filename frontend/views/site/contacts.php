<?php

$this->title = \common\components\StaticFunctions::getSettings('title') . " - " . Yii::t('main','contacts');

$lang = Yii::$app->session->get('lang');
if (empty($lang)) {
    $lang = Yii::$app->language;
}

?>

<!-- Page Banner Section Start -->
<div class="page-banner bg-color-05">
    <div class="page-banner__wrapper">
        <div class="container">

            <!-- Page Banner Caption Start -->
            <div class="page-banner__caption text-center">
                <h2 class="page-banner__main-title card p-5"><?=Yii::t('main','contacts')?></h2>
            </div>
            <!-- Page Banner Caption End -->

        </div>
    </div>
</div>
<!-- Page Banner Section End -->

<!-- Contact us Section Start -->
<div class="contact-section pb-5">
    <div class="container custom-container">

        <!-- Page Breadcrumb Start -->
        <div class="page-breadcrumb mb-15">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::Home()?>"><?=Yii::t('main','home')?></a></li>
                <li class="breadcrumb-item active"><?=Yii::t('main','contacts')?></li>
            </ul>
        </div>
        <!-- Page Breadcrumb End -->

        <div class="section-padding-02">
            <div class="row gy-8 justify-content-between">
                <div class="col-lg-4">
                    <!-- Contact Info Start -->
                    <div class="contact-info">

                        <!-- Section Title Start -->
                        <div class="section-title text-center text-lg-start" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="section-title__title-02"><?=Yii::t('main','contact-with-us')?></h2>
                        </div>
                        <!-- Section Title End -->

                        <div class="contact-info__wrapper" data-aos="fade-up" data-aos-duration="1000">

                            <!-- Contact Info Start -->
                            <div class="contact-info__item-02 text-center text-lg-start">
                                <div class="d-lg-flex gap-4 mb-4">
                                    <div class="contact-info__icon">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                    <div class="contact-info__content">
                                        <h3 class="contact-info__title"><?=Yii::t('main','address')?></h3>
                                    </div>
                                </div>
                                <p><?=\common\components\StaticFunctions::getSettings('address_footer')?></p>
                            </div>
                            <!-- Contact Info End -->

                            <!-- Contact Info Start -->
                            <div class="contact-info__item-02 text-center text-lg-start">
                                <div class="d-lg-flex gap-4 mb-4">
                                    <div class="contact-info__icon">
                                        <i class="fal fa-mobile-alt"></i>
                                    </div>
                                    <div class="contact-info__content">
                                        <h3 class="contact-info__title"><?=Yii::t('main','phone')?></h3>
                                    </div>
                                </div>
                                <p><a href="tel:<?=\common\components\StaticFunctions::getSettings('phone')?>"><?=\common\components\StaticFunctions::getSettings('phone')?></a></p>
                            </div>
                            <!-- Contact Info End -->

                            <!-- Contact Info Start -->
                            <div class="contact-info__item-02 text-center text-lg-start">
                                <div class="d-lg-flex gap-4 mb-4">
                                    <div class="contact-info__icon">
                                        <i class="fal fa-comment-alt-lines"></i>
                                    </div>
                                    <div class="contact-info__content">
                                        <h3 class="contact-info__title"><?=Yii::t('main','E-mail')?></h3>
                                    </div>
                                </div>
                                <p><a href="mailto:<?=\common\components\StaticFunctions::getSettings('mail')?>"><?=\common\components\StaticFunctions::getSettings('mail')?></a></p>
                            </div>
                            <!-- Contact Info End -->

                        </div>

                    </div>
                    <!-- Contact Info End -->
                </div>

                <div class="col-lg-7">

                    <!-- Contact Form Wrapper Start -->
                    <div class="contact-form__wrapper" data-aos="fade-up" data-aos-duration="1000">
                        <?php $form = \yii\bootstrap4\ActiveForm::begin([
                            'enableClientValidation' => true,
                            'options'=>[
                                'id' => 'contact-form'
                            ]
                        ]); ?>
                        <div class="row">

                            <?php if(Yii::$app->session->hasFlash('success')):?>
                                <div class="alert alert-success" role="alert"><?=Yii::$app->session->getFlash('success')?></div>
                            <?php endif;?>

                            <div class="col-lg-12 col-md-12 col-12 mb-3">
                                <div class="form-group">
                                    <?= $form->field($model, 'name')->textInput() ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mb-3">
                                <div class="form-group">
                                    <?= $form->field($model, 'email')->input('emai;') ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mb-3">
                                <div class="form-group">
                                    <?= $form->field($model, 'phone')->input('tel') ?>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-group textarea">
                                    <?= $form->field($model, 'body')->textarea(['rows' => 4]) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group button">
                                    <?= \yii\helpers\Html::submitButton(yii::t('main','send'), ['class' => 'btn btn-primary btn-hover-secondary w-100', 'id' => 'submit-btn']) ?>
                                </div>
                            </div>
                        </div>
                        <?php \yii\bootstrap4\ActiveForm::end(); ?>
                    </div>
                    <!-- Contact Form Wrapper End -->
                </div>
            </div>
        </div>



    </div>
</div>
<!-- Contact us Section End -->
