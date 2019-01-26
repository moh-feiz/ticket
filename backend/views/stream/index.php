<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
$user = \common\models\User::get_user();
$open = \common\models\Stream::get_stream_open();
$close = \common\models\Stream::get_stream_close();
/* @var $this yii\web\View */
/* @var $searchModel common\models\StreamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'درخواست ها');

?>

<div class="row">
    <h1 class="col-md-offset-4 col-md-6"><?= Html::encode($this->title) ?></h1>
</div>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div style="padding: 50px 20px" class="row">

        <div  class="panel panel-primary">
            <a href="<?= Url::toRoute('stream/open') ?>"><h4 style="padding: 10px" >TOTAL OPEN STREAM : <?= $open ?></h4></a>
        </div>
        <div class="panel panel-primary">
            <a href="<?= Url::toRoute('stream/close') ?>"><h4 style="padding: 10px">TOTAL FINISH STREAM : <?= $close ?></h4></a>
        </div>
    </div>





