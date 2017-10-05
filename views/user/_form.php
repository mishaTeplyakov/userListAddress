<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\bootstrap\ActiveForm */
?>


<div class="user-form input-sm">
    <?php $form = ActiveForm::begin(); ?>
        <div class="form-group">
            <ul>
                <li>
                    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>
                </li>
                <li>
                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                </li>

                <li>
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </li>

                <li>
                    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
                </li>

                <li>
                    <?= $form->field($model, 'sex')->textInput() ?>
                </li>

                <li>
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </li>
            </ul>
        </div>
        <div class="form-group">
        <ul>
            <li>
                <?= $form->field($address, 'country')->textInput(['maxlength' => true]) ?>
            </li>
            <li>
                <?= $form->field($address, 'city')->textInput(['maxlength' => true]) ?>
            </li>
            <li>
                <?= $form->field($address, 'street')->textInput(['maxlength' => true]) ?>
            </li>
            <li>
                <?= $form->field($address, 'post_index')->textInput(['maxlength' => true]) ?>
            </li>
            <li>
                <?= $form->field($address, 'num_home')->textInput(['maxlength' => true]) ?>
            </li>
            <li>
                <?= $form->field($address, 'num_office')->textInput(['maxlength' => true]) ?>
            </li>
        </ul>
        </div>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end(); ?>
</div>
