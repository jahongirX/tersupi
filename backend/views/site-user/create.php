<?php

use yii\helpers\Html;

$this->title = Yii::t('main', 'Create Site User');
$this->params['breadcrumbs'][] = ['label' => 'Site Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid container-fixed-lg m-t-20">

    <div class="panel panel-transparent">

        <div class="panel-body no-padding row-default">

            <div class="row">

                <div class="tab-content">

                    <?=  $this->render('_form', [
                        'model' => $model,
                        'id' => 1
                    ]) ?>

                </div>

            </div>
        </div>

    </div>

</div>
