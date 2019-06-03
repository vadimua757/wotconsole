<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Tanks */

$this->title = $model->tank_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Tanks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tanks-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->tank_id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->tank_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tank_id',
            'name_en',
            'name_ru',
            'description_ru',
            'description_en',
            'is_premium',
            'nation',
            'next_tanks',
            'price_credit',
            'price_gold',
            'prices_xp',
            'short_name_en',
            'short_name_ru',
            'tag',
            'tier',
            'type',
            'images',
        ],
    ]) ?>

</div>
