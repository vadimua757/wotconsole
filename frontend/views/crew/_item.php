<?php
/* @var $model \common\models\Crew */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use kartik\popover\PopoverX;

$image_arr = unserialize($model->images);
//var_dump($image_arr);
$image = $image_arr['large'];

?>
<h3><?= $model->name_ru ?></h3>
<p><?=Html::img($image) ?></p>
<p><?= $model->description_ru ?></p>
