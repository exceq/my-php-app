<?php
/* @var $model app\models\CartItem[] */
?>
<section class="h-100 h-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="font-weight-bold mb-0 text-black">Корзина</h1>
                                        <h6 class="mb-0 text-muted"><?= count($model) . " товара(ов)"?></h6>
                                    </div>

                                    <?php $sum=0; foreach ($model as $cartItem): $product=$cartItem->product; $sum += $product->price; ?>
                                    <hr class="my-4">

                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="<?= $product->productImages[0]->image_path ?>"
                                                    class="img-fluid rounded-3" alt="<?= $product->name ?>">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <h6 class="text-muted"><?= $product->category->name ?></h6>
                                            <h6 class="text-black mb-0"><?= $product->name ?></h6>
                                        </div>

                                        <!-- TODO сохранять изменение числа товаров-->
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <?= $cartItem->count . " шт."?>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h6 class="mb-0"><?= $product->price . " Р" ?></h6>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>

                                    <?php endforeach; ?>
                                    <hr class="my-4">
                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="/product/index" class="text-body">
                                                <i class="fas fa-long-arrow-alt-left me-2"></i>Вернуться к покупкам</a></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="font-weight text-muted-bold mb-5 mt-2 pt-1">Итого</h3>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase"><?= count($model) . " товара(ов) на сумму " . $sum . " ₽"?></h5>
                                    </div>

                                    <h5 class="text-uppercase text-muted mb-3">Промокод</h5>

                                    <div class="mb-5">
                                        <div class="form-outline">
                                            <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Examplea2">Введите ваш код</label>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Общая сумма</h5>
                                        <h5><?= $sum . " ₽"?></h5>
                                    </div>

                                    <button type="button" class="btn btn-dark btn-block btn-lg"
                                            data-mdb-ripple-color="dark">Оформить заказ</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @media (min-width: 1025px) {
        .h-custom {
            height: 100vh !important;
        }
    }

    .card-registration .select-input. form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
    }

    .card-registration .select-arrow {
        top: 13px;
    }

    .bg-grey {
        background-color: #eae8e8;
    }

    @media (min-width: 992px) {
        .card-registration-2 .bg-grey {
            border-top-right-radius: 16px;
            border-bottom-right-radius: 16px;
        }
    }

    @media (max-width: 991px) {
        .card-registration-2 .bg-grey {
            border-bottom-left-radius: 16px;
            border-bottom-right-radius: 16px;
        }
    }
</style>