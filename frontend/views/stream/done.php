<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/2/19
 * Time: 10:21 AM
 */

use common\models\Stream;
use common\models\Ticket;
use common\models\Usersubject;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

$user_subjects = Usersubject::get_user_subject();
?>
<link rel="stylesheet" href="<?= Yii::getAlias('@web') . '/css/stream/done.css' ?>"/>



<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemOptions' => ['class' => 'item'],
    'summary' => '',
    'itemView' => function ($model, $key, $index, $widget) {


        return Html::tag('div',''. Html::a(Html::encode($model->subject->title), ['show' ,'subject_id' => $model->subject_id]),['class'=>'done-stream ']);



    },
]) ?>

<script type="text/javascript" src="<?= Yii::getAlias('@web') . '/js/stream/kartabl.js' ?>"></script>








