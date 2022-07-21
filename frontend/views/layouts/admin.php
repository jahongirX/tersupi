<?php

use yii\helpers\Html;
use frontend\assets\AdminAsset;

AdminAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Surxondaryo viloyat Qurilish Bosh boshqarmasi">
    <title><?= Html::encode($this->title) ?></title>

    <?= Html::csrfMetaTags() ?>

    <?php $this->head() ?>

</head>

<body id="bg">

<?php $this->beginBody() ?>

<!-- Boxed Layout -->
<div id="wrapper">

    <?= \frontend\systemWidgets\Header::widget();?>

        <div class="page-wrapper">

            <div class="container-fluid">

            <?php echo frontend\systemWidgets\Sidebar::widget() ?>

            <?= $content;?>

            <?= \frontend\systemWidgets\Footer::widget();?>

            </div>

        </div>



</div>


<?php $this->endBody() ?>


</body>

</html>

<?php $this->endPage() ?>
