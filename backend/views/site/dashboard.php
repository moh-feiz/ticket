<?php
/**
 * Created by PhpStorm.
 * User: sadegh
 * Date: 1/9/19
 * Time: 4:53 PM
 */
use yii\helpers\Url;
$user = \common\models\User::get_user();
$open = \common\models\Stream::get_stream_open();
$close = \common\models\Stream::get_stream_close();

?>
<div class="container">

    <div class="row">

        <div class="col-md-3 panel panel-primary">
          <a href="<?= Url::toRoute('stream/open') ?>"><h4>TOTAL OPEN STREAM : <?= $open ?></h4></a>
        </div>
        <div class="col-md-3 panel panel-primary">
            <a href="<?= Url::toRoute('stream/close') ?>"><h4>TOTAL FINISH STREAM : <?= $close ?></h4></a>
        </div>
    </div>
</div>






