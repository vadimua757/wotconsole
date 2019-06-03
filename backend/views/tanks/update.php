<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tanks */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Tanks',
]) . ' ' . $model->tank_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Tanks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tank_id, 'url' => ['view', 'id' => $model->tank_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="tanks-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
