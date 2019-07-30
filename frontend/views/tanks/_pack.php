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
            <?php if($model->price_xp){
                echo $formatter->asInteger($model->price_xp);
            } ?>
            <?php if ($model->price_credit) {
               echo $formatter->asInteger($model->price_credit);
            } ?>
    </span>
</button>




