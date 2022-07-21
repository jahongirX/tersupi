<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);


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

<?php $form = ActiveForm::begin([
    'id' => 'create-form' . $id,
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'errorCssClass' => '',
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

    <div class="col-md-8">

        <div class="panel panel-default">

            <div class="panel-body">

                  <?= $form->field($model, 'name')->textarea(['rows' => 3]) ?>

                  <?= $form->field($model, 'description')->label( Yii::t('main', 'Description') )->textarea(); ?>


<!--                  --><?//= $form->field($model, 'created_date')->textInput() ?>
<!---->
<!--                  --><?//= $form->field($model, 'update_date')->textInput() ?>


            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="panel panel-default">

            <div class="panel-heading separator">
                <div class="panel-title"><?=Yii::t('main', 'Settings')?></div>
            </div>

            <div class="panel-body w-pad">

                <?= $form->field($model, 'category')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\DocumentCategory::find()->all(),'id','name'),['class'=>'full-width multi']) ?>

                <?php if(!$model->file): ?>

                <span>Мумкин булган файл турлари : <span class="badge badge-danger">PDF, DOC, DOCX </span></span>

                <?php

                    echo $form->field($model, 'file')->widget(FileInput::classname(), [
                        'pluginOptions' => [
                            'showPreview' => false,
                            'showCaption' => true,
                            'showRemove' => false,
                            'showUpload' => false,
                            'allowedFileExtensions'=>['pdf','doc','docx'],
                        ]
                    ]);

                ?>

                <?php else: ?>

                <div style="margin-bottom: 10px;">

                    <div class="alert alert-warning" style="margin-bottom: 5px;">
                        Ушбу хужжар буйича файл юкланган, янги хужжатни юклашдан олдин эскисини учириш керак!
                    </div>
                    <a href="<?=\common\components\StaticFunctions::getFile($model,'document','file')?>" class="btn btn-primary">Файлни очиш</a>
                    <a class="btn btn-danger" href="<?=\yii\helpers\Url::to(['document/delete-file','id' => $model->id])?>">Файлни учириш</a>

                </div>

                <?php endif; ?>


                <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

                <?php

                    if($model->isNewRecord){

                        $model->status = true;

                    }

                ?>

                <?= $form->field($model, 'status',
                    ['options' =>
                        ['class' => 'form-group form-group-default input-group'],
                        'template' => '<label class="inline" for="news-status">' . Yii::t("main", "Status") . '</label><span class="input-group-addon bg-transparent">{input}</span>',
                        'labelOptions' => ['class' => 'inline']
                    ])->checkbox([
                    'data-init-plugin' => 'switchery',
                    'data-color' => 'primary'
                ], false);
                ?>


            </div>
        </div>
    </div>

    <div class="col-md-12">

        <?=  Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

    </div>

<?php ActiveForm::end(); ?>
<script type="text/javascript">
    var editor = CKEDITOR.replace( 'document-description', {
        filebrowserBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=files',
        filebrowserImageBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=images',
        filebrowserFlashBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=flash',
        filebrowserUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=files',
        filebrowserImageUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=images',
        filebrowserFlashUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=flash'
    });
    CKFinder.setupCKEditor( editor, '../' );
</script>

