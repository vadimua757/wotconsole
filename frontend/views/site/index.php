<?php
use frontend\models\Tanks;
/* @var $this yii\web\View */
$this->title = Yii::$app->name;
?>
<div class="site-index">

    <?php echo \common\widgets\DbCarousel::widget([
        'key' => 'index',
        'assetManager' => Yii::$app->getAssetManager(),
        'options' => [
            'class' => 'slide', // enables slide effect
        ],
    ]) ?>

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <?php echo common\widgets\DbMenu::widget([
            'key'=>'frontend-index',
            'options'=>[
                'tag'=>'p'
            ]
        ]) ?>

    </div>

    <div class="body-content">
<?php
        $url = 'https://api-ps4-console.worldoftanks.com/wotx/encyclopedia/vehicles/?application_id=a9953a033483028e8f55458638a022a3&tier=9&language=ru&tank_id=1841';
        $tanks = Tanks::CurlPOST($url, null);

        var_dump($tanks)
?>
    </div>
</div>
