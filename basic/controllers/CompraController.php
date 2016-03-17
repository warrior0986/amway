<?php

namespace app\controllers;

use Yii;
use app\models\Compra;
use app\models\CompraSearch;
use app\models\CompraDetalle;
use app\models\Producto;
use app\models\Persona;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\models\Model;
use yii\helpers\ArrayHelper;

/**
 * CompraController implements the CRUD actions for Compra model.
 */
class CompraController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Compra models.
     * @return mixed
     */
    public function actionIndex()
    {
        $socio_id= '1';
        $nombre_socio=Persona::find()->where(['id'=>$socio_id])->one();
        $searchModel = new CompraSearch(['socio_id'=>$socio_id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Compra model.
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
     * Creates a new Compra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Compra();
        $model->socio_id=1;//Cambiarlo mas adelante por el usuario que esta logueado
        $modelDetalles= [new CompraDetalle()];
        if ($model->load(Yii::$app->request->post())) {
            
            $modelDetalles = Model::createMultiple(CompraDetalle::classname());
            Model::loadMultiple($modelDetalles, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelDetalles) && $valid;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelDetalles as $modelDetalle) {
                            $modelDetalle->compra_id = $model->id;
                            if (! ($flag = $modelDetalle->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelDetalles'=>(empty($modelDetalles)) ? [new CompraDetalle] : $modelDetalles,
            ]);
        }
    }

    /**
     * Updates an existing Compra model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelDetalles = $model->compraDetalles;

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelDetalles, 'id', 'id');
            $modelDetalles = Model::createMultiple(CompraDetalle::classname(), $modelDetalles);
            Model::loadMultiple($modelDetalles, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelDetalles, 'id', 'id')));

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelDetalles) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Address::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelDetalles as $modelAddress) {
                            $modelAddress->compra_id = $model->id;
                            if (! ($flag = $modelAddress->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelDetalles' => (empty($modelDetalles)) ? [new CompraDetalle] : $modelDetalles
            ]);
        }
    }

    /**
     * Deletes an existing Compra model.
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
     * Finds the Compra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Compra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Compra::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUnitario()
    {
        
        $id= Yii::$app->request->get('id');
        $producto= Producto::find()->where(['id'=>$id])->one();

        return Json::encode($producto);
    }
}
