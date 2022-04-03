<?php

use app\widgets\categoryList\CategoryList;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Одежда';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <nav class="col-2">
            <?php echo CategoryList::widget() ?>
        </nav>

        <div class="col-10">
            <div class="card-group">
                <?php foreach ($dataProvider->query->all() as $product): ?>
                    <div class="col-md-3">
                        <div id="cardItem" class="card">
                            <img class="img-fluid card-img-top" src="<?= $product->productImages[0]->image_path ?>"
                                 alt="Card image cap">

                            <h4 class="card-title ml-2 mr-2 mt-3"> <?= $product->price . " ₽" ?></h4>

                            <div class="card-text ml-2 mr-2 pd-3"> <?= $product->name ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<style>
    #cardItem:hover {
        box-shadow: 4px 4px 8px #cccccc;
        transform: scale(1.05);
    }

    .card-title {
        color: red;
    }
</style>