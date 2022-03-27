<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;

foreach ($model->category->getAllCategories() as $category)
    $this->params['breadcrumbs'][] = ['label' => $category->name, 'url' => Url::toRoute('/category  /' .$category->transliterated_name)];

$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <!--    <h1>--><? //= Html::encode($this->title) ?><!--</h1>-->
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <div class="row align-items-start">
        <div class="col">

            <img width="500px"
                 src="https://storage-cdn5.gloria-jeans.ru/medias/BAC009159-4-01-1200Wx1200H.jpg?context=bWFzdGVyfHByb2R1Y3R8OTMxNjB8aW1hZ2UvanBlZ3xoYWYvaGJiLzk0Njk5MzEwOTQwNDYvQkFDMDA5MTU5LTQtMDFfMTIwMFd4MTIwMEguanBnfDQ3ZjFiOWVlZWIwNzQzYjA5NTk1OTczN2ZkY2U1Njg0MTE2MDk3ZDE0ZmQ5ZWE4YzNiMzFjMDZhYmI5MWIxMzc">
        </div>
        <div class="col">
            <div class="h3 font-weight-bold text-uppercase">
                <?= $model->name ?>
            </div>
            <?= str_repeat("* ", round($model->getMeanMark())) . "  " . $model->getMeanMark() . '/5' ?>
            <?= 'Отзывов: ' . count($model->getComments()->all()) ?>

            <div>
                 
            </div>

            <?= 'Цена: ' . $model->price . "Р" ?>

            <div>
                 
            </div>

            <div>
                <?= $model->description ?>
            </div>
        </div>


    </div>
    <h1> </h1>

    <div class="container">
        <div class="h4">Отзывы</div>
        <div class="row">
            <div class="col-md-8" style="background: #9fcdff;">
                <?php foreach ($model->comments as $comment): ?>
                    <?= $comment->user->firstname ?>
                    <div></div>
                    <?= $comment->mark ?>
                    <div></div>
                    <?= $comment->date ?>
                    <div></div>
                    <?= $comment->text ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
