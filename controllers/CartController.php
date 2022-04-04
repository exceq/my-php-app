<?php

namespace app\controllers;

use app\models\CartItem;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CartController implements the CRUD actions for CartItem model.
 */
class CartController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['create'],
                    'rules' => [
                        [
                            'actions' => ['create'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
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
     * Displays a Cart page with Products.
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        return $this->render('view', [
            'model' => CartItem::findAllCartItemsOfUser(Yii::$app->user->id),
        ]);
    }

    /**
     * Add Product to Cart.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CartItem();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->loadDataAndSave(Yii::$app->user->id, $model->product_id)) {
                return $this->redirect(['view']);
            }
        }

        return $this->redirect('/product/view?id=' . $model->product_id);
    }

    /**
     * Deletes an existing CartItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        CartItem::deleteAll(['user_id' => Yii::$app->user->id]);

        return $this->redirect(['view']);
    }
}
