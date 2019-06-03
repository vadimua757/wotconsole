<?php
/**
 * @var $model common\models\PackagesTree
 */


$formatter = Yii::$app->formatter;

?>
<button type="button" class="btn btn-light <?= $model->id ?>" style="width: 100px; text-align: left; padding: 5px;">
    <span class="post" style="min-height: 40px;">

        <span class="title" style="">
            <?= $model->name ?>
        <br>
            <?= $model->type ?>
            <?= $model->price_xp ?>
            <?= $model->price_credit ?>
    </span>
</button>




