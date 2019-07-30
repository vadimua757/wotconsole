<?php

namespace backend\controllers;

use Yii;
use common\models\Tanks;
use common\models\search\TanksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use GuzzleHttp\Client;

/**
 * TanksController implements the CRUD actions for Tanks model.
 */
class TanksController extends Controller
{

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tanks models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TanksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tanks model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tanks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tanks();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tank_id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tanks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tank_id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tanks model.
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
     * Finds the Tanks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tanks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tanks::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSave()
    {
        $url =  env('PS4_URL') . 'encyclopedia/vehicles/?application_id=' . env('WG_APP_ID');
        $url_ru =  $url . '&language=ru';
        $url_en =  $url . '&language=en';

//        Yii::$app->db->createCommand()->truncateTable('tanks')->execute();

        $client = New Client();
        $request = $client->get($url_ru);
        $tanks_ru = json_decode($request->getBody()->getContents(), true);

        $tank_count = 0;
        $tank_names = '';
        foreach ($tanks_ru['data'] as $tanks_data){
            $exists = Tanks::find()->where( [ 'tank_id' => $tanks_data['tank_id'] ] )->exists();
            if($exists) {
                continue;
            } else {
                $tanks = new Tanks();
                $tanks->tank_id = $tanks_data['tank_id'];
                $tanks->description_ru = htmlspecialchars($tanks_data['description']);
                $tanks->short_name_ru = htmlspecialchars($tanks_data['short_name']);
                $tanks->price_gold = $tanks_data['price_gold'];
                $tanks->next_tanks = serialize($tanks_data['next_tanks']);
                $tanks->nation = $tanks_data['nation'];
                $tanks->is_premium = $tanks_data['is_premium'];
                $tanks->images = serialize($tanks_data['images']);
                $tanks->tag = $tanks_data['tag'];
//            $tanks->prices_xp = serialize($tanks_data['prices_xp']);
                $tanks->price_credit = $tanks_data['price_credit'];
                $tanks->tier = $tanks_data['tier'];
                $tanks->type = $tanks_data['type'];
                $tanks->name_ru = htmlspecialchars($tanks_data['name']);
                $tanks->save(false);

                ++$tank_count;
                $tank_names .= $tanks_data['name'] . "; ";
            }

        }

        $tanks_en = CurlPOST($url_en, null);

        foreach ($tanks_en['data'] as $tanks_data) {
            $tanks = $this->findModel($tanks_data['tank_id']);
            $tanks->description_en = htmlspecialchars($tanks_data['description']);
            $tanks->short_name_en = htmlspecialchars($tanks_data['short_name']);
            $tanks->name_en = htmlspecialchars($tanks_data['name']);
            $tanks->save(false);
        }

        Yii::$app->session->setFlash('success', "Добавлено ". $tank_count . " танков." . "<br>" . $tank_names);

        return $this->redirect(['index']);
    }
}
