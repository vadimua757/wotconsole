<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Crew */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Crew',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Crews'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crew-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
