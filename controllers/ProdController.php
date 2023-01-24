<?php

namespace app\controllers;

use app\models\Prod;
use app\models\ProdSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProdController implements the CRUD actions for Prod model.
 */
class ProdController extends Controller
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
     * Lists all Prod models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProdSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCatalog()
    {
        $searchModel = new ProdSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('catalog', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Prod model.
     * @param int $id_prod Id Prod
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_prod)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_prod),
        ]);
    }

    /**
     * Creates a new Prod model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Prod();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_prod' => $model->id_prod]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Prod model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_prod Id Prod
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_prod)
    {
        $model = $this->findModel($id_prod);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_prod' => $model->id_prod]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Prod model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_prod Id Prod
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_prod)
    {
        $this->findModel($id_prod)->delete();

        return $this->redirect(['index']);
    }


    /**
     * Finds the Prod model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_prod Id Prod
     * @return Prod the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_prod)
    {
        if (($model = Prod::findOne(['id_prod' => $id_prod])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
