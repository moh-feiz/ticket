<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Usersubject */
/* @var $form yii\widgets\ActiveForm */
$subjects = \common\models\Subject::getSubject();
$experts = \common\models\User::getExperts();
?>

<div class="usersubject-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subject_id')->dropDownList($subjects);?>
    <?= $form->field($model, 'user_id')->checkboxList($experts)?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
