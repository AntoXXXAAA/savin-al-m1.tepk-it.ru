<?php

namespace app\controllers;

use app\models\Workshops;
use app\models\WorkshopsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WorkshopsController implements the CRUD actions for Workshops model.
 */
class WorkshopsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Workshops models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new WorkshopsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Workshops model.
     * @param int $id_workshops Id Workshops
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_workshops)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_workshops),
        ]);
    }

    /**
     * Creates a new Workshops model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Workshops();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_workshops' => $model->id_workshops]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Workshops model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_workshops Id Workshops
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_workshops)
    {
        $model = $this->findModel($id_workshops);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_workshops' => $model->id_workshops]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Workshops model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_workshops Id Workshops
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_workshops)
    {
        $this->findModel($id_workshops)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Workshops model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_workshops Id Workshops
     * @return Workshops the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_workshops)
    {
        if (($model = Workshops::findOne(['id_workshops' => $id_workshops])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
