<?php

namespace app\controllers;

use app\models\CartItem;
use app\models\Order;
use app\models\Payment;
use app\models\ProductOrder;
use app\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
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
     * Displays a single Order model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionCreate()
    {
        $user_id = Yii::$app->user->id;
        if ($this->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();
            $success = true;

            $order = new Order();
            $order->user_id = $user_id;
            $order->date = time();
            $success = $success && $order->save();


            $sum = 0;
            foreach (CartItem::findAllCartItemsOfUser($user_id) as $item) {
                $sum += $item->count * $item->product->price;
                $order->link('products', $item->product);
            }
            $payment = new Payment();
            $payment->amount = $sum;
            $payment->date = time();
            $payment->link('user', User::findIdentity($user_id));

            $success = $success && $payment->save();
            $order->link('payment', $payment);

            CartItem::deleteAll(['user_id' => $user_id]);


            $success = $success && $order->save();
            if ($success) {
                $transaction->commit();
                return $this->redirect(['view', 'id' => $order->id]);
            } else {
                $transaction->rollBack();
                return $this->redirect(['/site/error']);
            }
        }

        return $this->render('create', [
            'model' => CartItem::findAllCartItemsOfUser($user_id),
        ]);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
