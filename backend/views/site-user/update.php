<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('main', 'Update User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$namev = isset($user) ? $user->username : '';
$emailv = isset($user) ? $user->email : '';
$districtv = isset($user) ? $user->district_id : '';
$rankv = isset($user) ? $user->rank: '';
?>

<?php $form = ActiveForm::begin(['id' => 'form-update']); ?>


    <div class="container-fluid container-fixed-lg m-t-20">

        <div class="panel panel-transparent">

            <div class="panel-body no-padding">
                <div class="panel panel-default">

                    <div class="panel-body page-header-block">

                        <h2><?= Html::encode($this->title) ?></h2>

                    </div>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="panel panel-default">

                    <div class="panel-body">

                        <?= $form->field($model, 'district_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\District::find()->where(['parent'=>8])->all(),'id','name'),[
                            'prompt' => 'Барча туманлар',
                            'value' => $districtv
                        ])->label('Лойихалар рухсати, туманлар буйича') ?>

                        <?= $form->field($model, 'rank')->dropDownList(Yii::$app->params['user_rank'],['value'=>$rankv])?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'value' => $namev]) ?>

                        <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'value' => $emailv]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                    </div>

                </div>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('main', 'Update'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            </div>

        </div>

    </div>

    </div>


<?php ActiveForm::end(); ?>