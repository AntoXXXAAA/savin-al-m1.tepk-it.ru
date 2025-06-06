<?php

namespace app\controllers;

use app\models\ProductWorkshops;
use app\models\ProductWorkshopsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductWorkshopsController implements the CRUD actions for ProductWorkshops model.
 */
class ProductWorkshopsController extends Controller
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
     * Lists all ProductWorkshops models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductWorkshopsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductWorkshops model.
     * @param int $id_product_workshops Id Product Workshops
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_product_workshops)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_product_workshops),
        ]);
    }

    /**
     * Creates a new ProductWorkshops model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProductWorkshops();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_product_workshops' => $model->id_product_workshops]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductWorkshops model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_product_workshops Id Product Workshops
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_product_workshops)
    {
        $model = $this->findModel($id_product_workshops);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_product_workshops' => $model->id_product_workshops]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductWorkshops model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_product_workshops Id Product Workshops
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_product_workshops)
    {
        $this->findModel($id_product_workshops)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductWorkshops model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_product_workshops Id Product Workshops
     * @return ProductWorkshops the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_product_workshops)
    {
        if (($model = ProductWorkshops::findOne(['id_product_workshops' => $id_product_workshops])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
