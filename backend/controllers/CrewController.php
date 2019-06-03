<?php

namespace backend\controllers;

use common\models\Tanks;
use Yii;
use common\models\Crew;
use common\models\search\CrewSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CrewController implements the CRUD actions for Crew model.
 */
class CrewController extends Controller
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
     * Lists all Crew models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CrewSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Crew model.
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
     * Creates a new Crew model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Crew();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Crew model.
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
     * Deletes an existing Crew model.
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
     * Finds the Crew model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Crew the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Crew::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSave()
    {
        $url =  env('PS4_URL') . 'encyclopedia/crewroles/?application_id=' . env('WG_APP_ID');
        $url_ru =  $url . '&language=ru';
        $url_en =  $url . '&language=en';

        Yii::$app->db->createCommand()->truncateTable('crew')->execute();

        $crew_ru = CurlPOST($url_ru, null);

        foreach ($crew_ru['data']['commander']['skills'] as $crew_key => $crew_data){
            $crew = new Crew();
            $crew->short_name = $crew_key;
            $crew->description_ru = htmlspecialchars($crew_data['description']);
            $crew->skill_name = $crew_data['skill_name'];
            $crew->is_perk = $crew_data['is_perk'];
            $crew->images = serialize($crew_data['images']);
            $crew->name_ru = htmlspecialchars($crew_data['name']);
            $crew->save(false);
        }

        $crew_en = CurlPOST($url_en, null);

        foreach ($crew_en['data']['commander']['skills'] as $crew_key => $crew_data) {
            $crew = Crew::findOne(['short_name'=> $crew_key]);
            $crew->description_en = htmlspecialchars($crew_data['description']);
            $crew->name_en = htmlspecialchars($crew_data['name']);
            $crew->save(false);
        }

        return $this->redirect(['index']);
    }
}
