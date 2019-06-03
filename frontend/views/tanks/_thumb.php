<?php

/**
 * @var $this yii\web\View
 * @var $item array
 * @var $model common\models\Tanks
 */


    $image_arr = unserialize($item['images']);
    $image = $image_arr['big_icon'];
    $price_gold = "<img style=\"width:15px\" src=\"http://wxpcdn.gcdn.co/static/89e7685/portal/img/svg-icons/currency/gold.svg\" alt=\"\">" . $item['price_gold'];
    $price_credit = "<img style=\"width:15px\" src=\"http://wxpcdn.gcdn.co/static/89e7685/portal/img/svg-icons/currency/silver.svg\" alt=\"\">" . $item['price_credit'];
    ?>

    <div class="thumbnail <?= $item['tag']?>" style="background-image: url(<?=$image?>); background-size: 80%;background-repeat: no-repeat; background-color: #080808ba">
        <div class="post" style="min-height: 50px">
            <div class="title" style="font-size: 12px; text-align: right;height: 35px; color: whitesmoke;">
                <?= $item['name_ru']
//                <?= PopoverX::widget([
//                    'header' =>  $item['name_ru'],
//                    'placement' => PopoverX::ALIGN_BOTTOM,
//                    'content' => $item['description_ru'],
////            'footer' => Html::button('Submit', ['class'=>'btn btn-sm btn-primary']),
//                    'toggleButton' => ['label'=> $item['name_ru'], 'class'=>'btn btn-default tank_title'],
//                ]);
               ?>
            </div>
            <div class="content" style="position: absolute; color: whitesmoke">
                <?php
                if ($item['price_credit'] > 0){
                    echo $price_credit;
                }
                if ($item['price_gold'] > 0){
                    echo $price_gold;
                }
                ?>
            </div>
        </div>
    </div>




