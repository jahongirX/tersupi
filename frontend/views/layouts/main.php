<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\widgets\ActiveForm;
use yii\web\View;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=\common\components\StaticFunctions::getSettings('title')?>">
    <meta property="og:title" content="<?=\common\components\StaticFunctions::getSettings('title')?>"/>
    <meta property="og:image" content="/images/logo.png" />

    <title><?= Html::encode($this->title) ?></title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

    <?= Html::csrfMetaTags() ?>

    <?php $this->head() ?>

</head>

<body id="bg">

    <?php $this->beginBody() ?>

    <!-- Boxed Layout -->
    <main class="main-wrapper">


        <?= \frontend\widgets\Header::widget();?>

        <?= $content;?>

        <?= \frontend\widgets\Footer::widget();?>

        <!--Back To Start-->
        <button id="backBtn" class="back-to-top backBtn">
            <i class="arrow-top fal fa-long-arrow-up"></i>
            <i class="arrow-bottom fal fa-long-arrow-up"></i>
        </button>
        <!--Back To End-->

    </main>
    <!-- End Boxed Layout -->


    <?php $this->endBody() ?>

</body>

</html>

<?php $this->endPage() ?>
