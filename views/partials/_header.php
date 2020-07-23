<?php

/* @var $this \yii\web\View */

use yii\helpers\Url;
?>

<header class="s-header header">

    <div class="header__top">
        <div class="header__logo">
            <a class="site-logo" href="index.html">
                <img src="/images/logo.svg" alt="Homepage">
            </a>
        </div>

        <!-- toggles -->
        <a href="#0" class="header__menu-toggle"><span>Menu</span></a>

    </div>

    <nav class="header__nav-wrap">

        <ul class="header__nav">
            <li class="current"><a href="<?= Url::toRoute(['site/index'])?>" title="">Home</a></li>
            <?php if(Yii::$app->user->isGuest): ?>
                <li><a href="<?= Url::toRoute(['auth/login'])?>" title="">Login</a></li>
                <li><a href="<?= Url::toRoute(['auth/register'])?>" title="">Register</a></li>
            <?php endif; ?>
            <?php if(!Yii::$app->user->isGuest): ?>
                <li><a href="<?= Url::toRoute(['site/add-article'])?>" title="">Add Article</a></li>
            <?php endif; ?>
            <li><a href="<?= Url::toRoute(['site/about'])?>" title="">About</a></li>
            <li><a href="<?= Url::toRoute(['site/contact'])?>" title="">Contact</a></li>
            <?php if(!Yii::$app->user->isGuest): ?>
                <li><a href="<?= Url::toRoute(['auth/logout'])?>" title="">Logout</a></li>
            <?php endif; ?>
        </ul> <!-- end header__nav -->
    </nav> <!-- end header__nav-wrap -->

</header> <!-- end s-header -->
