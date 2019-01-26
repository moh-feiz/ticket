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
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'summary' => '',
            'itemView' => function ($model, $key, $index, $widget) {
if($model->user_type == 1){
    return Html::tag('div', 'پیام کارشناس:' . Html::tag('p', Html::encode($model->response))
        . Html::tag('p', Html::encode($model->created_at)), ['class' => 'position-content-expert']);

}else{
    return Html::tag('div', 'پیام کاربر:' . Html::tag('p', Html::encode($model->response))
        . Html::tag('p', Html::encode($model->created_at)), ['class' => 'position-content-user']);
}



            },
        ]) ?>
    </div>


    <!-- .Html::a('دانلود', $model->media->name)  -->

