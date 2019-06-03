<?php

namespace frontend\controllers;

use common\models\Package;
use common\models\Packagess;
use common\models\PackagesTree;
use common\models\search\TanksSearch;
use common\models\Tanks;
use Yii;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;

class TanksController extends \yii\web\Controller
{

    public function actionIndex()
    {
        $searchModel = new TanksSearch();

        $usa_tanks = $searchModel->search(['TanksSearch'=>['nation'=> 'usa']])->getModels();
        $germany_tanks = $searchModel->search(['TanksSearch'=>['nation' => 'germany']])->getModels();
        $uk_tanks = $searchModel->search(['TanksSearch'=>['nation' => 'uk']])->getModels();
        $ussr_tanks = $searchModel->search(['TanksSearch'=>['nation' => 'ussr']])->getModels();
        $france_tanks = $searchModel->search(['TanksSearch'=>['nation' => 'france']])->getModels();
        $japan_tanks = $searchModel->search(['TanksSearch'=>['nation' => 'japan']])->getModels();
        $china_tanks = $searchModel->search(['TanksSearch'=>['nation' => 'china']])->getModels();
        $czech_tanks = $searchModel->search(['TanksSearch'=>['nation' => 'czech']])->getModels();
        $sweden_tanks = $searchModel->search(['TanksSearch'=>['nation' => 'sweden']])->getModels();
        $poland_tanks = $searchModel->search(['TanksSearch'=>['nation' => 'poland']])->getModels();
        $italy_tanks = $searchModel->search(['TanksSearch'=>['nation' => 'italy']])->getModels();
        $merc_tanks = $searchModel->search(['TanksSearch'=>['nation' => 'merc']])->getModels();

        return $this->render('index', [
            'usa' => $usa_tanks,
            'germany' => $germany_tanks,
            'uk' => $uk_tanks,
            'ussr' => $ussr_tanks,
            'france' => $france_tanks,
            'japan' => $japan_tanks,
            'china' => $china_tanks,
            'czech' => $czech_tanks,
            'sweden' => $sweden_tanks,
            'poland' => $poland_tanks,
            'italy' => $italy_tanks,
            'merc' => $merc_tanks,
        ]);
    }

    public function actionContent($id)
    {
        $package = unserialize(Package::findOne($id)->packages_tree_id);
        $packagess = [];
        if (is_array($package) || is_object($package))
        {
            $packagess = new ActiveDataProvider([
                'query' => PackagesTree::find()->where(['in', 'id', $package]),
                    'pagination' => false,
            ]);
            $pack = '';
//            foreach ($package as $value)
//            {
//
//                $packagess[] = Packagess::findOne($value);
////                $packagess[] = $value;
//            }
        }


        $tank = Tanks::findOne($id);
        if (Yii::$app->request->isAjax){
            return $this->renderAjax('_content', [
                'item' => $tank,
                'package' => $package,
                'dataProvider' => $packagess,
//                'dataProvider' => $models,
                ]);
        }
        return null;
    }
}
