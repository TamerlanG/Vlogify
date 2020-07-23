<?php

/* @var $this View */
/* @var $form ActiveForm */
/* @var $model SignUpForm */

use app\models\SignUpForm;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

$this->title = 'Register';

?>

<div class="s-content content">
    <main class="row content__page">

        <section class="column large-full entry format-standard">
            <div class="content__page-header">
                <h1 class="display-1">
                    Sign Up
                </h1>
            </div>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"form-field\">{input}</div><p>{error}</p>"
                ]
            ]) ?>
            <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'class' => 'full-width']); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class' => 'full-width']); ?>

            <?= $form->field($model, 'password')->passwordInput(['class' => 'full-width']); ?>

            <?= Html::submitButton('Login', array('class'=>'btn btn--primary btn-wide btn--large', 'style' => 'margin-top: 20px')) ?>

            <?php ActiveForm::end(); ?>

        </section>

    </main>

</div>
