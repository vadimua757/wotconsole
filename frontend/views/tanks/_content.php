<?php

/**
 * @var $this yii\web\View
 * @var $item array
 * @var $package array
 * @var $packagess array
 * @var $model common\models\Tanks
 * @var $dataProvider yii\data\ActiveDataProvider
 */
use common\models\Package;
use miloschuman\highcharts\Highcharts;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

    $image_arr = unserialize($item['images']);
    $image = $image_arr['big_icon'];
    $price_gold = "<img style=\"width:15px\" src=\"http://wxpcdn.gcdn.co/static/89e7685/portal/img/svg-icons/currency/gold.svg\" alt=\"\">" . $item['price_gold'];
    $price_credit = "<img style=\"width:15px\" src=\"http://wxpcdn.gcdn.co/static/89e7685/portal/img/svg-icons/currency/silver.svg\" alt=\"\">" . $item['price_credit'];
    ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <img alt=" <?= $item['name_ru'] ?>" src="<?= $image ?>" />
        </div>
        <div class="col-md-9">


<!--            --><?php
//            if ($dataProvider){
//                echo ListView::widget([
//                    'dataProvider' => $dataProvider,
//                    'itemView' => '_pack',
//                    'summary'=>'',
//                    'options' => ['style' => 'display: flex;'],
//                    'itemOptions' => [
////                            'class' => 'btn button',
//                            'style' => 'padding-right: 20px;'
//                    ],
//                ]);
//            }
//            ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <hr>
            <?= $item['description_ru'] ?>
        </div>
    </div>
</div>




