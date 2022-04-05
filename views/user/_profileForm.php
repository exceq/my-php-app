<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['action' => 'profile']); ?>

    <?= $form->field($model, 'username')->textInput(); ?>



    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'phone_number')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
