<?php
/* @var $this yii\web\View */

use yii\data\ActiveDataProvider;
use common\models\Crew;
use circulon\widgets\ColumnListView;


$dataProvider = new ActiveDataProvider([
    'query' => Crew::find(),
    'pagination' => [
        'pageSize' => 200,
    ],
]);

echo ColumnListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item',
    'columns' => 3, // default : 1
]);