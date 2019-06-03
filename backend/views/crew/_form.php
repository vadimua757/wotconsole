<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Crew */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="crew-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'description_ru')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'description_en')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'is_perk')->textInput() ?>

    <?php echo $form->field($model, 'skill_name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'images')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
