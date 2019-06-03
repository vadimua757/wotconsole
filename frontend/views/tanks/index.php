<?php
/**
 * @var $this \yii\web\View
 * @var $usa array
 * @var $germany array
 * @var $uk array
 * @var $ussr array
 * @var $france array
 * @var $japan array
 * @var $china array
 * @var $czech array
 * @var $sweden array
 * @var $poland array
 * @var $italy array
 * @var $merc array
 *
 */
use kartik\tabs\TabsX;

$items = [
    [
        'label'=>'<img src="//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/usa_r_color.png" class="nation-img"> USA',
        'content'=>
            Yii::$app->controller->renderPartial('_tank', ['nation' => $usa]),
        'active'=>true
    ],
    [
        'label'=>'<img src="//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/germany_r_color.png" class="nation-img"> Germany',
        'content'=>Yii::$app->controller->renderPartial('_tank', ['nation' => $germany]),
    ],
    [
        'label'=>'<img src="//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/uk_r_color.png" class="nation-img"> U.K.',
        'content'=>Yii::$app->controller->renderPartial('_tank', ['nation' => $uk]),
    ],
    [
        'label'=>'<img src="//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/ussr_r_color.png" class="nation-img"> U.S.S.R.',
        'content'=>Yii::$app->controller->renderPartial('_tank', ['nation' => $ussr]),
    ],
    [
        'label'=>'<img src="//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/france_r_color.png" class="nation-img"> France',
        'content'=>Yii::$app->controller->renderPartial('_tank', ['nation' => $france]),
    ],
    [
        'label'=>'<img src="//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/japan_r_color.png" class="nation-img"> Japan',
        'content'=>Yii::$app->controller->renderPartial('_tank', ['nation' => $japan]),
    ],
    [
        'label'=>'<img src="//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/china_r_color.png" class="nation-img"> China',
        'content'=>Yii::$app->controller->renderPartial('_tank', ['nation' => $china]),
    ],
    [
        'label'=>'<img src="//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/czech_r_color.png" class="nation-img"> Czechoslovakia',
        'content'=>Yii::$app->controller->renderPartial('_tank', ['nation' => $czech]),
    ],
    [
        'label'=>'<img src="//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/sweden_r_color.png" class="nation-img"> Sweden',
        'content'=>Yii::$app->controller->renderPartial('_tank', ['nation' => $sweden]),
    ],
    [
        'label'=>'<img src="//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/poland_r_color.png" class="nation-img"> Poland',
        'content'=>Yii::$app->controller->renderPartial('_tank', ['nation' => $poland]),
    ],
    [
        'label'=>'<img src="//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/italy_r_color.png" class="nation-img"> Italy',
        'content'=>Yii::$app->controller->renderPartial('_tank', ['nation' => $italy]),
    ],
    [
    'label'=>'<img src="//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/merc_r_color.png" class="nation-img"> Mercenaries',
    'content'=>Yii::$app->controller->renderPartial('_tank', ['nation' => $merc]),
    ],
];


echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_LEFT,
//    'itemOptions'=>['style'=>'overflow:auto'],
    'encodeLabels'=>false,
]);
