<?php

/* @var $this yii\web\View */
/* @var $articles \app\models\Articles */
/* @var $pagination \yii\data\Pagination */


use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Home';
?>
<div class="s-content">

    <div class="masonry-wrap">

        <div class="masonry">

            <div class="grid-sizer"></div>

            <?php foreach ($articles as $article): ?>
                <article class="masonry__brick entry format-standard animate-this">
                    <div class="entry__text">
                        <div class="entry__header">
                            <h2 class="entry__title"><a href="<?= Url::toRoute(['site/view', 'id' => $article->id])?>"><?= $article->title ?></a></h2>
                            <div class="entry__meta">
                            <span class="entry__meta-date">
                                        <a href="<?= Url::toRoute(['site/view', 'id' => $article->id])?>"><?= date("Y-m-d", $article->created_at); ?></a>
                                    </span>
                            </div>

                        </div>
                        <div class="entry__excerpt">
                            <p>
                                <?= $article->content ?>
                            </p>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div> <!-- end masonry -->

    </div> <!-- end masonry-wrap -->

    <?php
        echo LinkPager::widget([
                'pagination' => $pagination,
                //Css option for container
                'options' => ['class' => 'row column large-full pgn'],
                //Current Active option value
                'activePageCssClass' => 'current',

                // Css for each options. Links
                'linkOptions' => ['class' => 'pgn__num'],

                // Customzing CSS class for navigating link

                'prevPageLabel' => '',
                'nextPageLabel' => '',
        ])
    ?>
</div>
