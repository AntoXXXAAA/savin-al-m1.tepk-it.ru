<?php

namespace app\controllers;

use app\models\WorkshopType;
use app\models\WorkshopTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WorkshopTypeController implements the CRUD actions for WorkshopType model.
 */
class WorkshopTypeController extends Controller
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
     * Lists all WorkshopType models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new WorkshopTypeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WorkshopType model.
     * @param int $id_workshop_type Id Workshop Type
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_workshop_type)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_workshop_type),
        ]);
    }

    /**
     * Creates a new WorkshopType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new WorkshopType();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_workshop_type' => $model->id_workshop_type]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing WorkshopType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_workshop_type Id Workshop Type
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_workshop_type)
    {
        $model = $this->findModel($id_workshop_type);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_workshop_type' => $model->id_workshop_type]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WorkshopType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_workshop_type Id Workshop Type
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_workshop_type)
    {
        $this->findModel($id_workshop_type)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WorkshopType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_workshop_type Id Workshop Type
     * @return WorkshopType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_workshop_type)
    {
        if (($model = WorkshopType::findOne(['id_workshop_type' => $id_workshop_type])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
