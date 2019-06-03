<?php

/**
 * @var $this yii\web\View
 * @var $tanks array
 * @var $model common\models\Tanks
 */

use kartik\popover\PopoverX;
use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\bootstrap\Modal;
use lo\widgets\modal\ModalAjax;
use yii\helpers\Url;

foreach ($tanks as $item){

    echo ModalAjax::widget([
//        'id' => 'createCompany',
        'header' => $item['name_ru'],
        'size' => Modal::SIZE_LARGE,
        'toggleButton' => [
            'tag' => 'a',
            'label' => Yii::$app->controller->renderPartial('_thumb',['item'=>$item]),

        ],
        'url' => Url::to(['/tanks/content/?id='.$item['tank_id']]), // Ajax view with form to load
        'ajaxSubmit' => false, // Submit the contained form as ajax, true by default
        // ... any other yii2 bootstrap modal option you need
    ]);
                ?>

<?php }
