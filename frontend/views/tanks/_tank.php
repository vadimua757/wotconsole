<?php
/**
 * @var $this yii\web\View
 * @var $nation common\models\Tanks
 */

use yii\helpers\ArrayHelper;

//$image_arr = unserialize($model->images);
//$image = $image_arr['big_icon'];

$lvl1 = [];
$lvl2 = [];
$lvl3 = [];
$lvl4 = [];
$lvl5 = [];
$lvl6 = [];
$lvl7 = [];
$lvl8 = [];
$lvl9 = [];
$lvl10 = [];


//$neededObject = array_filter(
//    $arrayOfObjects,
//    function ($e) use (&$searchedValue) {
//        return $e->id == $searchedValue;
//    }
//);


 $tanks = ArrayHelper::toArray($nation);

foreach ($tanks as $item){
    switch ($item['tier']) {
        case 1:
            array_push($lvl1, $item);
            break;
        case 2:
            array_push($lvl2, $item);
            break;
        case 3:
            array_push($lvl3, $item);
            break;
        case 4:
            array_push($lvl4, $item);
            break;
        case 5:
            array_push($lvl5, $item);
            break;
        case 6:
            array_push($lvl6, $item);
            break;
        case 7:
            array_push($lvl7, $item);
            break;
        case 8:
            array_push($lvl8, $item);
            break;
        case 9:
            array_push($lvl9, $item);
            break;
        case 10:
            array_push($lvl10, $item);
            break;
    }
}
?>

<div class="row" style="height: 20px">
    <div class="col-md-1">
        1
    </div>
    <div class="col-md-1">
        2
    </div>
    <div class="col-md-1">
        3
    </div>
    <div class="col-md-1">
        4
    </div>
    <div class="col-md-1">
        5
    </div>
    <div class="col-md-1">
        6
    </div>
    <div class="col-md-1">
        7
    </div>
    <div class="col-md-1">
        8
    </div>
    <div class="col-md-1">
        9
    </div>
    <div class="col-md-1">
        10
    </div>
</div>

<div class="row">
    <div class="col-md-1">
        <?= Yii::$app->controller->renderPartial('_lvl', ['tanks' => $lvl1]); ?>
    </div>
    <div class="col-md-1">
        <?= Yii::$app->controller->renderPartial('_lvl', ['tanks' => $lvl2]); ?>
    </div>
    <div class="col-md-1">
        <?= Yii::$app->controller->renderPartial('_lvl', ['tanks' => $lvl3]); ?>
    </div>
    <div class="col-md-1">
        <?= Yii::$app->controller->renderPartial('_lvl', ['tanks' => $lvl4]); ?>
    </div>
    <div class="col-md-1">
        <?= Yii::$app->controller->renderPartial('_lvl', ['tanks' => $lvl5]); ?>
    </div>
    <div class="col-md-1">
        <?= Yii::$app->controller->renderPartial('_lvl', ['tanks' => $lvl6]); ?>
    </div>
    <div class="col-md-1">
        <?= Yii::$app->controller->renderPartial('_lvl', ['tanks' => $lvl7]); ?>
    </div>
    <div class="col-md-1">
        <?= Yii::$app->controller->renderPartial('_lvl', ['tanks' => $lvl8]); ?>
    </div>
    <div class="col-md-1">
        <?= Yii::$app->controller->renderPartial('_lvl', ['tanks' => $lvl9]); ?>
    </div>
    <div class="col-md-1">
        <?= Yii::$app->controller->renderPartial('_lvl', ['tanks' => $lvl10]); ?>
    </div>
</div>
