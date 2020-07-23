<?php
/* @var $article \app\models\Articles */
/* @var $comments \app\models\Comments */
/* @var $comment \app\models\Comments */
/* @var $this View */
/* @var $form ActiveForm */
/* @var $model CommentForm */

use app\models\CommentForm;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

?>

<div class="s-content content">
    <main class="row content__page">

        <article class="column large-full entry format-standard">

            <?= \ymaker\social\share\widgets\SocialShare::widget([
                'configurator'  => 'socialShare',
                'title'         => $article->title,
                'description'   => $article->content,
            ]); ?>

            <div class="content__page-header entry__header">
                <h1 class="display-1 entry__title">
                    <?= $article->title ?>
                </h1>
                <ul class="entry__header-meta">
                    <li class="author">By <?= $article->author->name ?></li>
                    <li class="date"><?= date("Y-m-d", $article->created_at); ?></li>
                </ul>
            </div> <!-- end entry__header -->

            <div class="entry__content">
                <p>
                    <?= $article->content ?>
                </p>
            </div> <!-- end entry content -->
        </article> <!-- end column large-full entry-->


        <div class="comments-wrap">

            <div id="comments" class="column large-12">

                <h3 class="h2"><?= count($comments) ?> Comments</h3>

                <!-- START commentlist -->
                <ol class="commentlist">
                    <?php foreach ($comments as $comment): ?>
                        <li class="depth-1 comment">
                            <div class="comment__content">
                                <div class="comment__info">
                                    <div class="comment__author"><?= $comment->author->name ?></div>
                                </div>
                                <div class="comment__text">
                                    <p>
                                        <?= $comment->text ?>
                                    </p>
                                </div>
                            </div>

                        </li> <!-- end comment level 1 -->
                    <?php endforeach; ?>
                </ol>
                <!-- END commentlist -->

            </div> <!-- end comments -->

            <div class="column large-12 comment-respond">

                <!-- START respond -->
                <div id="respond">

                    <h3 class="h2">Add Comment <span>Your email address will not be published</span></h3>

                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"form-field\">{input}</div><p>{error}</p>"
                        ]
                    ]) ?>
                    <div class="message form-field">
                        <?= $form->field($model, 'text')->textarea(['autofocus' => true, 'class' => 'full-width']); ?>
                    </div>

                    <?= Html::submitButton('Add Comment', array('class'=>'btn btn--primary btn-wide btn--large full-width', 'style' => 'margin-top: 20px')) ?>

                    <?php ActiveForm::end(); ?>

                </div>
                <!-- END respond-->

            </div> <!-- end comment-respond -->

        </div> <!-- end comments-wrap -->
    </main>

</div>
