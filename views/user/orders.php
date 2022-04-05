<?php
/* @var $model app\models\Order[] */
?>

<div class="container">
    <div class="row">
        <div class="col-md-3 ">
            <div class="list-group ">
                <a href="/user/profile" class="list-group-item list-group-item-action">Профиль</a>
                <a href="#" class="list-group-item list-group-item-action active">История заказов</a>


            </div>
        </div>
        <div class="col-md-9">

            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                        <p class="lead fw-normal mb-0" style="color: #a8729a;">Заказы</p>
                </div>

                <?php foreach ($model as $order):
                    $sum = 0; ?>
                    <div class="card shadow-0 border mb-4">
                        <div class="card-body">
                            <?php foreach ($order->products as $product):
                                $i = 0;
                                $sum += $product->price * $order->productOrders[$i]->count ?>
                                <div class="row">

                                    <div class="col-md-2">
                                        <img src="<?= $product->productImages[0]->image_path ?>"
                                             class="img-fluid" alt="Phone">
                                    </div>
                                    <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0"><?= $product->name ?></p>
                                    </div>
                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0 small"><?= $order->productOrders[$i++]->count ?>
                                            шт.</p>
                                    </div>
                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0 small">Описание</p>
                                    </div>

                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0 small"><?= $product->price ?> ₽</p>
                                    </div>
                                </div>
                                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">

                            <?php endforeach; ?>
                            <div class="row d-flex align-items-center">
                                    <div class="col-md-12 row">
                                    <p class="text-muted mb-0 small col-md-4">Информация о заказе <?= $order->id ?>:</p>
                                    <p class="text-muted mb-0 small col-md-4">Сумма: <?= $sum ?> ₽</p>
                                    <p class="text-muted mb-0 small col-md-4">Дата заказа: <?= \Yii::$app->formatter->asDate($order->date); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
