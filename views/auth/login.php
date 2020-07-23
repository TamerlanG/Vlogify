<?php

/* @var $this View */
/* @var $form \yii\widgets\ActiveForm */
/* @var $model LoginForm */

use app\models\LoginForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;

$this->title = 'Login';
?>

<div class="s-content content">
    <main class="row content__page">

        <section class="column large-full entry format-standard">
            <div class="content__page-header">
                <h1 class="display-1">
                    Log in
                </h1>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"form-field\">{input}</div><p>{error}</p>"
                ]
            ]) ?>
            <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class' => 'full-width']); ?>

            <?= $form->field($model, 'password')->passwordInput(['class' => 'full-width']); ?>

            <?= Html::submitButton('Login', array('class'=>'btn btn--primary btn-wide btn--large', 'style' => 'margin-top: 20px')) ?>

            <?php ActiveForm::end(); ?>
        </section>

    </main>

</div>
