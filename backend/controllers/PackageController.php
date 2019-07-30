<?php

namespace backend\controllers;

use common\models\Packagess;
use common\models\PackagesTree;
use common\models\Tanks;
use Yii;
use common\models\Package;
use common\models\search\PackageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PackageController implements the CRUD actions for Package model.
 */
class PackageController extends Controller
{

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                    'save' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Package models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PackageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Package model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Package model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Package();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Package model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Package model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Package model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Package the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Package::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSave($id)
    {

            $url =  env('PS4_URL') . 'encyclopedia/vehiclepackages/?application_id=' . env('WG_APP_ID');
            $url_ru =  $url . '&tank_id=' . $id . '&language=ru';
//            $url_en =  $url . '&tank_id=' . $tank['tank_id'] . '&language=en';

            $packages_ru = CurlPOST($url_ru, null);

            foreach($packages_ru['data'] as $key => $value) {

                $ids = [];
                foreach ($value['packages'] as $k => $v){
                    $ids[] = $k;
                    $packages = Packagess::findOne($k);
                    if(!$packages):
                        $packages = new Packagess();
                    endif;

                    $packages->id = $k;
                    $packages->engine = serialize($v['engine']);
                    $packages->max_ammo = $v['max_ammo'];
                    $packages->signal_range = $v['signal_range'];
                    $packages->weight = $v['weight'];
                    $packages->shells = serialize($v['shells']);
                    $packages->armor = serialize($v['armor']);
                    $packages->hp = $v['hp'];
                    $packages->gun = serialize($v['gun']);
                    $packages->is_default = $v['is_default'];
                    $packages->turret = serialize($v['turret']);
                    $packages->hull_weight = $v['hull_weight'];
                    $packages->speed_forward = $v['speed_forward'];
                    $packages->hull_hp = $v['hull_hp'];
                    $packages->speed_backward = $v['speed_backward'];
                    $packages->suspension = serialize($v['suspension']);
                    $packages->max_weight = $v['max_weight'];
                    $packages->save(false);
                }
                $ids_tree = [];
                foreach ($value['packages_tree'] as $k => $v){
                    $ids_tree[] = $k;

                    $packages_tree = PackagesTree::findOne($k);
                    if(!$packages_tree):
                        $packages_tree = new PackagesTree();
                    endif;

                    $packages_tree->id = $k;
                    $packages_tree->name = $v['name'];
                    $packages_tree->next_packages = serialize($v['next_packages']);
                    $packages_tree->next_tanks = serialize($v['next_tanks']);
                    $packages_tree->price_xp = $v['price_xp'];
                    $packages_tree->price_credit = $v['price_credit'];
                    $packages_tree->type = $v['type'];
                    $packages_tree->save(false);
                }

                $package = Package::findOne($key);
                if(!$package):
                    $package = new Package();
                endif;

                $package->id = $key;
                $package->default_package_id = $value['default_package_id'];
                $package->packages_id = serialize($ids);
                $package->packages_tree_id = serialize($ids_tree);
                $package->save(false);
            }

        $request = Yii::$app->request;

        if ($request->isPost) {
//            return $this->redirect(['tanks/index']);
//            Yii::$app->session->setFlash('success', "Статья сохранена");
            return $this->redirect(Yii::$app->request->referrer);
        }
        return $this->redirect(['index']);
    }

    public function actionGet() :void
    {
        $tanks = Tanks::find()->all();
        foreach ($tanks as $tank) {
            try {
                $this->actionSave($tank->attributes['tank_id']);
            } catch (\Exception $exception)
            {Yii::$app->session->setFlash('danger', $exception->getMessage());}
        }
    }
}
