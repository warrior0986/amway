<?php

namespace app\controllers;

use Yii;
use app\models\Venta;
use app\models\VentaDetalle;
use app\models\VentaSearch;
use app\models\Producto;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Model;
use yii\helpers\ArrayHelper;

/**
 * VentaController implements the CRUD actions for Venta model.
 */
class VentaController extends Controller
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
     * Lists all Venta models.
     * @return mixed
     */
    public function actionIndex()//el $socio_id será seteado con el $socio_id del logueado
    {
        $socio_id= 1;
        $searchModel = new VentaSearch(['socio_id'=>$socio_id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Venta model.
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
     * Creates a new Venta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Venta();
        $model->socio_id=1;//Cambiarlo mas adelante por el usuario que esta logueado
        $modelDetalles= [new VentaDetalle()];
        if ($model->load(Yii::$app->request->post())) {

            $modelDetalles = Model::createMultiple(VentaDetalle::classname());
            Model::loadMultiple($modelDetalles, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelDetalles) && $valid;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelDetalles as $modelDetalle) {
                            $modelDetalle->venta_id = $model->id;
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

            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelDetalles'=>(empty($modelDetalles)) ? [new VentaDetalle] : $modelDetalles,
            ]);
        }
    }

    /**
     * Updates an existing Venta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     } else {
    //         return $this->render('update', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    /**
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelDetalles = $model->ventaDetalles;
        //print_r($modelDetalles);die;
        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelDetalles, 'id', 'id');
            $modelDetalles = Model::createMultiple(VentaDetalle::classname(), $modelDetalles);
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
                            VentaDetalle::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelDetalles as $modelDetalle) {
                            //print_r($model->id);die;
                            $modelDetalle->venta_id = $model->id;
                            if (! ($flag = $modelDetalle->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }

                    }
                    $flag=$model->save();

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }else{

        return $this->render('update', [
            'model' => $model,
            'modelDetalles' => (empty($modelDetalles)) ? [new VentaDetalle] : $modelDetalles
        ]);
        }
    }

    /**
     * Deletes an existing Venta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionUnitario()
    {
        
        $id= Yii::$app->request->get('id');
        $producto= Producto::find()->where(['id'=>$id])->one();
        $valor_unitario= $producto->vr_publico;
        return $valor_unitario;
    }
    /**
     * Finds the Venta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Venta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Venta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
