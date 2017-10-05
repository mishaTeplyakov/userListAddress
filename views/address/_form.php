<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($address,'user_id')->textInput(['maxlength' => true])?>

                <?= $form->field($address, 'country')->textInput(['maxlength' => true]) ?>

                <?= $form->field($address, 'city')->textInput(['maxlength' => true]) ?>

                <?= $form->field($address, 'street')->textInput(['maxlength' => true]) ?>

                <?= $form->field($address, 'post_index')->textInput(['maxlength' => true]) ?>

                <?= $form->field($address, 'num_home')->textInput(['maxlength' => true]) ?>

                <?= $form->field($address, 'num_office')->textInput(['maxlength' => true]) ?>

    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end(); ?>

</div>