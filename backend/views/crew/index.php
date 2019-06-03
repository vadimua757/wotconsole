<?php

use yii\helpers\Html;
use kartik\dynagrid\DynaGrid;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CrewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Crews');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crew-index">

    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],

        'name_en',
        'name_ru',
        'description_ru',
        'description_en',
        'is_perk',
        'short_name',
        [
            'attribute' => 'images',
            'format' => 'image',
            'value'=>function($data) {
                $image = unserialize($data->images);
                return $image['large'];
            },
        ],
        ['class' => 'yii\grid\ActionColumn'],
    ];
    $dynagrid = DynaGrid::begin([
        'columns' => $gridColumns,
        'theme'=>'panel-info',
        'showPersonalize'=>true,
        'storage' => 'session',
        'gridOptions'=>[
            'dataProvider'=>$dataProvider,
            'filterModel'=>$searchModel,
//            'showPageSummary'=>true,
            'floatHeader'=>false,
            'pjax'=>true,
            'responsiveWrap'=>false,

            'toolbar' =>  [
                ['content'=>
                    Html::a('<i class="fa fa-plus"></i>', ['create'], ['type'=>'button', 'title'=>'Add Book', 'class' => 'btn btn-success'])
                ],
                ['content'=>'{dynagridFilter}{dynagridSort}{dynagrid}'],
                '{export}',
            ]
        ],
        'options'=>['id'=>'dynagrid-1'] // a unique identifier is important
    ]);
    if (substr($dynagrid->theme, 0, 6) == 'simple') {
        $dynagrid->gridOptions['panel'] = false;
    }
    DynaGrid::end();
    ?>
</div>
