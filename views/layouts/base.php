<?php
/** User: Tamerlan Gudabayev */

use app\assets\MainAssets;
use yii\helpers\Html;

/** @var $content string */
/** @var $this \yii\web\View */

MainAssets::register($this);

?>
<?php $this->beginPage(); ?>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta name="description" content="blog site using yii2">
    <meta name="author" content="Tamerlan Gudabayev">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <style type="text/css" media="screen">
        .s-styles {
            max-width: 1100px;
            padding-bottom: 12rem;
        }
    </style>

    <?php $this->head() ?>

    <!-- favicons ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
    <link rel="manifest" href="/images/site.webmanifest">
</head>
<body class="ss-bg-white">
<?= $this->render('../partials/_preloader') ?>
<div id="top" class="s-wrap site-wrapper">
    <?= $this->render('../partials/_header') ?>
    <?php $this->beginBody(); ?>
    <?php echo $content ?>
    <?= $this->render('../partials/_footer') ?>
    <?php $this->endBody(); ?>
</div>
</body>
</html>
<?php $this->endPage(); ?>
