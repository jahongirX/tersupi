<?php



use yii\helpers\Html;

use yii\widgets\ActiveForm;

use kartik\date\DatePicker;



$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);



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

                  <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                  <?= $form->field($model, 'created_date')->widget(DatePicker::classname(), [
                      'options' => [
                            'placeholder' => "Resurs sa'nasi",
                            'value' => date("Y-m-d H:i:s")
                      ],
                      'pluginOptions' => [
                          'autoclose' => true
                      ]
                  ]);?>

            </div>



        </div>



    </div>

    <div class="col-md-4">

        <div class="panel panel-default">

            <div class="panel-body">
                <?php

                if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/m_' . $model->image )) {

                    ?>



                    <img class="image_preview postImage" data-title="<?=$model->title ?>" data-img="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/l_' . $model->image ?>"src="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/m_' . $model->image ?>"/>



                    <?php

                } else {

                    ?>



                    <img class="image_preview" src="<?= Yii::$app->params['frontend'] . '/images/default/m_post.jpg' ?>"/>



                    <?php

                }

                ?>

                <?= $form->field($model, 'image', ['options' => ['class' => 'form-group fileinput-box']])->fileInput(['class' => 'fileinput'])->label(Yii::t('main', 'Yuklash')) ?>


            </div>

        </div>

        <div class="panel panel-default">

            <div class="panel-body">


                <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\ResourceCategory::find()->all(),'id','name'),[
                    'class'=>'full-width multi'
                ]) ?>

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

    var editor = CKEDITOR.replace( 'resource-body', {

        filebrowserBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=files',

        filebrowserImageBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=images',

        filebrowserFlashBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=flash',

        filebrowserUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=files',

        filebrowserImageUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=images',

        filebrowserFlashUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=flash'

    });

    CKFinder.setupCKEditor( editor, '../' );

</script>