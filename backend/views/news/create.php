<?php


use kartik\file\FileInput;
use yii\helpers\Html;

use yii\grid\GridView;

use yii\helpers\Url;

use yii\widgets\ActiveForm;

use kartik\date\DatePicker;



$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);



$this->title = Yii::t('main', 'Add News');

$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Newses'), 'url' => ['index']];

$this->params['breadcrumbs']['title'] = $this->title;


?>



<style>

    .remove-btn {

        float: left;

        cursor: pointer;

        margin: 3px 10px;

    }

</style>

<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>



<div class="container-fluid container-fixed-lg m-t-20">



	<div class="panel panel-transparent">



        <div class="panel-body no-padding">

			<div class="panel panel-default">

				<div class="panel-body page-header-block">

					<h2><?= Html::encode($this->title) ?></h2>

            	</div>

			</div>

		</div>



        <div class="panel-body no-padding row-default">



            <div class="row">



                <?php $form = ActiveForm::begin([

                    'id' => 'create-form1',

                    'enableAjaxValidation' => false,

                    'enableClientValidation' => true,

                    'errorCssClass' => '',

                    'options' => ['enctype' => 'multipart/form-data']

                ]); ?>



                <div class="col-md-8">



                    <div class="panel panel-default">





                        <div class="panel-body">



                            <?= $form->field($model, 'title')->label('Заголовок') ?>



                            <?= $form->field($model, 'second_title')->label('Подзаголовок') ?>



                            <?= $form->field($model, 'anons')->textarea(['rows'=>3])->label('Анонс') ?>



                            <?= $form->field($model, 'body')->label('Контент')->textarea(); ?>



                            <?= $form->field($model, 'event_date')->widget(DatePicker::classname(), [

                                'options' => ['placeholder' => 'Выберите дату публикации ...'],

                                'pluginOptions' => [

                                    'autoclose'=>true,

                                    'format' => 'yyyy-mm-dd',

                                ]

                            ]);



                            ?>



                        </div>



                    </div>



                </div>



                <div class="col-md-4">

                    <div class="panel panel-default">

                        <div class="panel-heading separator">

                            <div class="panel-title"><?=Yii::t('main', 'Image') ?></div>

                        </div>

                        <div class="panel-body">

                            <?php

                            if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/m_' . $model->main_image )) {

                                ?>



                                <img class="image_preview" src="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/m_' . $model->main_image ?>"/>



                                <?php

                            } else {

                                ?>



                                <img class="image_preview" src="<?= Yii::$app->params['frontend'] . '/images/default/m_post.jpg' ?>"/>



                                <?php

                            }

                            ?>

                            <?= $form->field($model, 'main_image', ['options' => ['class' => 'form-group fileinput-box']])->fileInput(['class' => 'fileinput'])->label(Yii::t('main', 'Upload')) ?>

                        </div>

                    </div>

                    <div class="panel panel-default">



                        <div class="panel-heading separator">

                            <div class="panel-title"><?=Yii::t('main', 'Settings')?></div>

                        </div>



                        <div class="panel-body w-pad">



                            <?= $form->field($model, 'category[]')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\NewsCategory::getLangModels(),'id','name'),['class'=>'full-width multi']) ?>



                            <?php



                                $model->status = true;



                            ?>



                            <?= $form->field($model, 'status',

                                ['options' =>

                                    ['class' => 'form-group form-group-default input-group'],

                                    'template' => '<label class="inline" for="news-status">' . Yii::t('main', 'Status') . ' </label><span class="input-group-addon bg-transparent">{input}</span>',

                                    'labelOptions' => ['class' => 'inline']

                                ])->checkbox([

                                'data-init-plugin' => 'switchery',

                                'data-color' => 'primary',

                                'checked' => 'checked',

                            ], false);

                            ?>



                            <?= $form->field($model, 'slider',

                                ['options' =>

                                    ['class' => 'form-group form-group-default input-group'],

                                    'template' => '<label class="inline" for="news-slider">' . Yii::t("main", "Slider") . '</label><span class="input-group-addon bg-transparent">{input}</span>',

                                    'labelOptions' => ['class' => 'inline']

                                ])->checkbox([

                                'data-init-plugin' => 'switchery',

                                'data-color' => 'primary'

                            ], false);

                            ?>



                        </div>

                    </div>

                    <div class="panel panel-default">



                        <div class="panel-heading separator">

                            <div class="panel-title"><?=Yii::t('main', 'Rasmlar')?></div>

                        </div>



                        <div class="panel-body w-pad">


                            <?php

                                echo $form->field($model, 'postImages')->widget(FileInput::classname(), [
                                    'options' => [
                                        'accept' => 'image/*',
                                        'multiple' => true
                                    ],
                                ]);

                            ?>



                        </div>

                    </div>

                </div>



                <div class="col-md-12">

                    <?= Html::submitButton(Yii::t('main', 'Create'), ['class' => 'btn btn-primary']) ?>

                </div>



                <?php ActiveForm::end(); ?>



			</div>

		</div>

	</div>

</div>



<script type="text/javascript">

    var editor = CKEDITOR.replace( 'news-body', {

        filebrowserBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=files',

        filebrowserImageBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=images',

        filebrowserFlashBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=flash',

        filebrowserUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=files',

        filebrowserImageUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=images',

        filebrowserFlashUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=flash'

    });

    CKFinder.setupCKEditor( editor, '../' );

</script>