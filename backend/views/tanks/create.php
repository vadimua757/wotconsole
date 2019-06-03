<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Tanks */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Tanks',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Tanks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tanks-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
