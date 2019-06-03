<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\dynagrid\DynaGrid;
use \common\models\Package;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TanksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $gridColumns array */
$this->title = Yii::t('backend', 'Tanks');
$this->params['breadcrumbs'][] = $this->title;

echo Yii::$app->session->getFlash('success');

?>
<div class="tanks-index">
    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],

        'tank_id',
        'name_en',
        'name_ru',
        'description_ru',
        'description_en',
//         'is_premium',
        [
            'class' => 'kartik\grid\BooleanColumn',
            'attribute' => 'is_premium',
            'vAlign' => 'middle'
        ],
//         'nation',
        [
            'attribute' => 'nation',
            'format' => 'image',
            'value'=>function($data) {
                $image = getNationImage($data->nation);
                return $image;
            },
        ],
         'next_tanks',
         'price_credit',
         'price_gold',
         'prices_xp',
         'short_name_en',
         'short_name_ru',
         'tag',
         'tier',
         'type',
        [
            'attribute' => 'images',
            'format' => 'image',
            'value'=>function($data) {
                $image = unserialize($data->images);
                return $image['big_icon'];
            },
        ],
        [
            'attribute' => 'package',
//            'format' => 'raw',
            'value'=>function($data) {
                $packs = Package::findOne($data->tank_id);
                if ($packs){
                    return implode (' ', unserialize($packs->packages_id));
                }
                return null;
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{save} {view} {update} {delete}',
            'buttons' => [
//                'save' => function ($url) {
//                    return Html::a(
//                        '<span class="glyphicon glyphicon-arrow-down"></span>',
//                        $url,
//                        [
//                            'title' => 'Parse packages',
//                            'data-pjax' => '0',
//                        ]
//                    );
//                },
                'save' => function ($url, $model) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-arrow-down"></span>',
                        ['package/save', 'id' => $model->tank_id],
                        [ 'data-method' => 'post'],
                        [
                            'title' => 'Parse packages',
                            'data-pjax' => '0',
                        ]
                    );
                },

            ],
        ],

    ];
    $dynagrid = DynaGrid::begin([
        'columns' => $gridColumns,
        'theme'=>'panel-info',
        'showPersonalize'=>true,
        'storage' => DynaGrid::TYPE_COOKIE,
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
//                . ' '.
//                    Html::a('<i class="fa fa-repeat"></i>', ['dynagrid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-outline-secondary', 'title'=>'Reset Grid'])
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
