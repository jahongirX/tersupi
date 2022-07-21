<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);

?>

<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>

<div class="site-signup row">

    <div class="col-md-8">

        <div class="panel panel-default">

            <div class="panel-body">


                <h1><?= Html::encode($this->title) ?></h1>

            </div>

        </div>

    </div>

    <div class="col-md-8">

        <div class="panel panel-default">

            <div class="panel-body">

                <?php
                $namev = isset($userm) ? $userm->username : '';
                $emailv = isset($userm) ? $userm->email : '';
                $phonev = isset($user) ? $user->phone : '';
                $districtv = isset($user) ? $user->district_id : '';
                $rankv = isset($user) ? $user->rank: '';
                ?>
                <?php $form = \yii\bootstrap\ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'district_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\District::find()->where(['parent'=>8])->all(),'id','name'),[
                        'prompt' => 'Барча туманлар',
                ])->label('Лойихалар рухсати, туманлар буйича') ?>

                <?= $form->field($model, 'rank')->dropDownList(Yii::$app->params['user_rank'])->label('Лойихалар рухсати, туманлар буйича') ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'value' => $namev])->label('Логин') ?>

                <?= $form->field($model, 'email')->input('email', ['value' => $emailv])->label('Электрон почта') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

                <div class="form-group">
                    <?= Html::submitButton('Qo\'shish', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>

        </div>

    </div>

</div>
