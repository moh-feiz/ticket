<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/19/19
 * Time: 12:47 PM
 */

use common\models\Rate;
use common\models\Stream;
use common\models\Subject;

$subject = Subject::get_Subjects();



?>
<?php foreach ($subject as $subjects) { ?>
    <?php $streams = Stream::get_streams($subjects['id']); ?>


    <div class="row">
        <div class="col-md-6">
            <p><?= $subjects['title'] ?></p>
        </div>
        <div class="col-md-6">
            <?php foreach ($streams as $stream) { ?>
                <?php $rate = Rate::get_rate($stream['id']) ?>
                <p> id :<?= $stream->subject_id?></p>
                <p> rate :<?= $rate ?></p>

                <p> stream_id :<?= $stream['id'] ?></p>
            <?php } ?>
        </div>

    </div>

<?php } ?>





