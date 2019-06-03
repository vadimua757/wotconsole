<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\TanksSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="tanks-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'tank_id') ?>

    <?php echo $form->field($model, 'name_en') ?>

    <?php echo $form->field($model, 'name_ru') ?>

    <?php echo $form->field($model, 'description_ru') ?>

    <?php echo $form->field($model, 'description_en') ?>

    <?php // echo $form->field($model, 'is_premium') ?>

    <?php // echo $form->field($model, 'nation') ?>

    <?php // echo $form->field($model, 'next_tanks') ?>

    <?php // echo $form->field($model, 'price_credit') ?>

    <?php // echo $form->field($model, 'price_gold') ?>

    <?php // echo $form->field($model, 'prices_xp') ?>

    <?php // echo $form->field($model, 'short_name_en') ?>

    <?php // echo $form->field($model, 'short_name_ru') ?>

    <?php // echo $form->field($model, 'tag') ?>

    <?php // echo $form->field($model, 'tier') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'images') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
