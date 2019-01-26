<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StreamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'درخواست های پایان یافته');

?>
<div class="stream-index" style="direction: rtl">

    <link type="text/css" rel="stylesheet" href="<?= Yii::getAlias('@web') . '/css/stream/udone.css' ?>"/>
        <div class="row title-str">
            <h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-1">
                <h4><?php echo $this->render('_search', ['model' => $searchModel]); ?></h4>
            </div>



    </div>
    <?php Pjax::begin(); ?>



    <div class="title-str">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {

            if($model->user->id == yii::$app->user->id && $model->status == 2){
                return Html::tag('div', '' . Html::a(Html::encode($model->title), ['view', 'id' => $model->id]), ['class' => 'title-stream']);

            }

        },
    ]) ?>

    <?php Pjax::end(); ?>
    </div>
</div>
