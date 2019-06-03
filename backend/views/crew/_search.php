<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\CrewSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="crew-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'name_en') ?>

    <?php echo $form->field($model, 'name_ru') ?>

    <?php echo $form->field($model, 'description_ru') ?>

    <?php echo $form->field($model, 'description_en') ?>

    <?php // echo $form->field($model, 'is_perk') ?>

    <?php // echo $form->field($model, 'skill_name') ?>

    <?php // echo $form->field($model, 'images') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
