<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Tanks */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="tanks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'description_ru')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'description_en')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'is_premium')->textInput() ?>

    <?php echo $form->field($model, 'nation')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'next_tanks')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'price_credit')->textInput() ?>

    <?php echo $form->field($model, 'price_gold')->textInput() ?>

    <?php echo $form->field($model, 'prices_xp')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'short_name_en')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'short_name_ru')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'tier')->textInput() ?>

    <?php echo $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'images')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
