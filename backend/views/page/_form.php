<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$css = <<<CSS
    
    .krajee-default.file-preview-frame{
        width: 45%;
    }
    .krajee-default.file-preview-frame .kv-file-content{
        width: 100%;
    }
    .krajee-default .file-footer-caption{
        display: none;
    }
    .krajee-default.file-preview-frame .file-thumbnail-footer{
        position: absolute;
        bottom: 7px;
        left: 0;
        right: 0;
        margin: auto 7px;
        height: auto;
    }

CSS;

$this->registerCss($css);

$gallery = $model->getPageGallery();

?>

<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>

<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'errorCssClass' => '',
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

<div class="col-md-8">

    <div class="panel panel-default">

        <div class="panel-body">

            <?= $form->field($model, 'title')->label( Yii::t('main', 'Title') ) ?>


            <?= $form->field($model, 'body')->label( Yii::t('main', 'Content') )->textarea(); ?>

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

                <img class="image_preview postImage" data-title="<?=$model->title ?>" data-img="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/l_' . $model->main_image ?>"src="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/m_' . $model->main_image ?>"/>

                <?php
            } else {
                ?>

                <img class="image_preview" src="<?= Yii::$app->params['frontend'] . '/images/default/m_post.jpg' ?>"/>

                <?php
            }
            ?>
            <?= $form->field($model, 'main_image', ['options' => ['class' => 'form-group fileinput-box']])->fileInput(['class' => 'fileinput mb-5'])->label(Yii::t('main', 'Upload')) ?>

            <a href="<?=\yii\helpers\Url::to(['page/delete-page-image','id' => $model->id])?>" class="btn-block btn btn-danger">Rasmni o'chirish</a>

        </div>
    </div>



    <div class="panel panel-default">

        <div class="panel-heading separator">
            <div class="panel-title"><?=Yii::t('main', 'Settings')?></div>
        </div>

        <div class="panel-body w-pad">

            <div class="form-group form-group-default input-group clipboard" data-clipboard-text="/<?=Yii::$app->controller->id?>/view/<?=$model->id?>"  >
                <label class="inline" for="post-link"><?=Yii::t('main', 'Link')?></label>
                <span class="input-group-addon" style="min-width: 150px;">
                    <input type="text" id="post-link" class="form-control" value="/<?=Yii::$app->controller->id?>/view/<?=$model->id?>">
                </span>
            </div>

            <?php

            if($model->isNewRecord){

                $model->status = true;

            }

            ?>

            <?= $form->field($model, 'status',
                ['options' =>
                    ['class' => 'form-group form-group-default input-group'],
                    'template' => '<label class="inline" for="page-status">' . Yii::t("main", "Status") . '</label><span class="input-group-addon bg-transparent">{input}</span>',
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

            echo $form->field($model, 'gallery')->widget(FileInput::classname(), [
                'options' => [
                    'accept' => 'image/*',
                    'multiple' => true,

                ],
                'pluginOptions' => [
                    'showCaption' => false,
                    'showRemove' => false,
                    'showUpload' => false,
                    'initialPreview'=> $gallery['images'],
                    'initialPreviewConfig' => $gallery['config'],
                    'fileActionSettings' => [
                        'fileActionSettings' => [
                            'showZoom' => false,
                            'showDelete' => true,
                        ],
                    ],
                    'initialPreviewAsData' => true,
                    'initialCaption' => "Post Images",
                    'overwriteInitial' => false,
                    'maxFileSize'=>2800
                ]
            ]);

            ?>



        </div>

    </div>

</div>

<div class="col-md-12">

    <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

</div>
<?php ActiveForm::end(); ?>

<script type="text/javascript">
    var editor = CKEDITOR.replace( 'page-body', {
        filebrowserBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=files',
        filebrowserImageBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=images',
        filebrowserFlashBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=flash',
        filebrowserUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=files',
        filebrowserImageUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=images',
        filebrowserFlashUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=flash'
    });
    CKFinder.setupCKEditor( editor, '../' );
</script>
