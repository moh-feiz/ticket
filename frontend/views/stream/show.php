<?php

use common\models\Ticket;
use yii\helpers\Url;
use common\models\Rate;
use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = Yii::t('app', 'درخواست های پایان یافته');
?>
<link rel="stylesheet" href="<?= Yii::getAlias('@web') . '/css/stream/show.css' ?>"/>
<div class="stream-show">


<h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>


<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemOptions' => ['class' => 'item'],
    'summary' => '',
    'itemView' => function ($model, $key, $index, $widget) {

        if($model->status == 2)
        {
            return Html::tag('div', '' .Html::a(Html::encode($model->title), ['view', 'id' => $model->id]),['class'=>'show-stream '] );
        }
    },
]) ?>

</div>

