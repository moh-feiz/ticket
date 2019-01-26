<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Stream */
/* @var $form yii\widgets\ActiveForm */
$subjects = \common\models\Subject::getSubject();
?>

<div class="stream-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // echo $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subject_id')->dropDownList($subjects) ?>

    <?= $form->field($model, 'priority')->dropDownList([1 => 'ضروری' , 2 => 'عادی']) ?>

    <?php // echo $form->field($model, 'status')->textInput() ?>

    <?php // echo $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>