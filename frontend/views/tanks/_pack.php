<?php
/**
 * @var $model common\models\PackagesTree
 */


$formatter = Yii::$app->formatter;

$price_xp = "<img style=\"width:15px\" src=\"http://wxpcdn.gcdn.co/static/89e7685/portal/img/svg-icons/currency/gold.svg\" alt=\"\">" ;
$price_credit = "<img style=\"width:15px\" src=\"http://wxpcdn.gcdn.co/static/89e7685/portal/img/svg-icons/currency/silver.svg\" alt=\"\">" . $formatter->asInteger($model->price_credit);

?>
        <span class="title" style="">
            <?= $model->name ?>
            <?= $model->id ?>
            <br>
            <?= $model->type ?>
            <br>
            <?php if($model->price_xp){
                echo $formatter->asInteger($model->price_xp);
            } ?>
            <br>
            <?php if ($model->price_credit) {
               echo $price_credit;
            } ?>
    </span>



