<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

use yii\helpers\HtmlPurifier;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StreamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Streams');


?>
<link type="text/css" rel="stylesheet" href="<?=Yii::getAlias('@web').'/css/stream/open.css' ?>"/>



<div class="stream-list">
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <h4><?php echo $this->render('_search', ['model' => $searchModel]); ?></h4>
        </div>
    </div>

    <div class="list-stream">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'summary' => '',
            'itemView' => function ($model, $key, $index, $widget) {

                if($model->status == 2)
                {

                    return Html::tag('div',''. Html::a(Html::encode($model->title), ['view' ,'id' => $model->id]),['class'=>'open-stream ']);
                }
            },
        ]) ?>
    </div>
</div>
<script type="text/javascript" src="<?= Yii::getAlias('@web') . '/js/stream/index.js' ?>"></script>
