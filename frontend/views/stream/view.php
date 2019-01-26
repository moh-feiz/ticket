<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use common\models\Ticket;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Stream */

$this->title = $model->title;

?>


<link rel="stylesheet" href="<?= Yii::getAlias('@web') . '/css/stream/view.css' ?>"/>


<div class="stream-view" style="direction: rtl">
<div class="row">
    <div class="col-md-12">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>
</div>
    <div class="row">
        <div class="col-md-12">
            <p>
                <?php if (Yii::$app->user->identity->role == 2 && $model->status == 1) { ?>

                    <?= Html::a(Yii::t('app', 'FINISH'), ['finish', 'id' => $model->id], [
                        'class' => 'btn btn-lg btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to Finish this item?'),
                            'method' => 'post',
                        ],
                    ]) ?>
                <?php } ?>

                <?php if (Yii::$app->user->identity->role == 3 && $model->status == 2 && !$model->rate) { ?>
                    <?= Html::a(Yii::t('app', 'امتیازدهی '), ['rate/create', 'id' => $model->id], [
                        'class' => 'btn btn-lg btn-danger',

                    ]) ?>
                <?php } ?>
            </p>
        </div></div>









    <!--if active ticket form else rate-->


    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'summary' => '',
        'itemView' => function ($model, $key, $index, $widget) {


            if ($model->user_type == 0 && $model->media) {
                return Html::tag('div', 'پیام کاربر:' .
                    Html::tag('p', Html::encode($model->response)) . Html::tag('p', Html::encode($model->created_at)) .
                    Html::a(Html::encode('download: ' . $model->media->type), ['media/download', 'id' => $model->media->id], ['class' => 'btn btn-lg btn-primary']), ['class' => 'position-content-user']);

            } else if ($model->user_type == 0 && !$model->media) {
                return Html::tag('div', 'پیام کاربر:' . Html::tag('p', Html::encode($model->response)) . Html::tag('p', Html::encode($model->created_at)), ['class' => 'position-content-user']);
            } else if ($model->user_type == 1 && $model->media) {
                return Html::tag('div', 'پیام گارشناس:' .
                    Html::tag('p', Html::encode($model->response)) . Html::tag('p', Html::encode($model->created_at)) .
                    Html::a(Html::encode('download: ' . $model->media->type), ['media/download', 'id' => $model->media->id], ['class' => 'btn btn-lg btn-primary']), ['class' => 'position-content-expert']
                );;
            } else {
                return Html::tag('div', 'پیام کارشناس:' . Html::tag('p', Html::encode($model->response)) . Html::tag('p', Html::encode($model->created_at)), ['class' => 'position-content-expert']);
            }


        },
    ]) ?>
</div>
<?php if ($model->status == 1){ ?>
<?php $ticket = new Ticket();
Pjax::begin(['enablePushState' => false]);
$form = ActiveForm::begin([
    'action' => ['ticket/create'],
    'enableClientValidation' => false,
    'options' => ['data-pjax' => ''],

]);
?>

<div style="direction: rtl ; padding:50px 100px  ; margin: 20px">
    <?= $form->field($ticket, 'response')->textarea(['rows' => 4]) ?>
    <?= $form->field($ticket, 'attachment')->fileInput()->label('پیوست') ?>


    <input type="hidden" name="Ticket[stream_id]" value="<?= $model->id ?>">
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'ذخیره'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end() ?>


    <?php } ?>
</div>


<!-- .Html::a('دانلود', $model->media->name)  -->

