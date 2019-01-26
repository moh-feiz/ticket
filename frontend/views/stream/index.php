<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ListView;


/* @var $this yii\web\View */
/* @var $searchModel common\models\StreamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'درخواست ها');

?>
<link type="text/css" rel="stylesheet" href="<?= Yii::getAlias('@web') . '/css/stream/index.css' ?>"/>
<div class="stream-index" style="direction: rtl">
    <div class="row title-str">
        <h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <h4><?php echo $this->render('_search', ['model' => $searchModel]); ?></h4>
        </div>
        <div class="col-md-6">
            <p>
                <?= Html::a(Yii::t('app', 'ثبت درخواست جدید'), ['create'], ['class' => 'btn btn-lg  btn-success']) ?>
            </p>
        </div>
    </div>
    <div class="title-str">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'summary' => '',
            'itemView' => function ($model, $key, $index, $widget) {
                if ($model->user->id == yii::$app->user->id && $model->status == 1) {
                    return Html::tag('div', '' . Html::a(Html::encode($model->title), ['view', 'id' => $model->id]), ['class' => 'title-stream']);
                }
            },
        ]) ?>

    </div>
</div>
