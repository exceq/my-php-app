<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $model app\models\Product */

/* @var $this yii\web\View */
/* @var $modelComment app\models\Comment */
/* @var $form ActiveForm */

$this->title = $model->name;

foreach ($model->category->getAllCategories() as $category)
    $this->params['breadcrumbs'][] = ['label' => $category->name, 'url' => Url::toRoute('/category/view?id=' . $category->id)];

$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="product-view">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <img class="img-fluid"
                     src=<?= $model->productImages[0]->image_path ?>>
            </div>
            <div class="col-md-5">
                <div class="h3 font-weight-bold text-uppercase">
                    <?= $model->name ?>
                </div>
                <div class="md-3 mt-3">
                    <?= str_repeat("* ", round($model->getMeanMark())) . "  " . $model->getMeanMark() . '/5' ?>
                    <?= 'Отзывов: ' . count($model->getComments()->all()) ?>
                </div>
                <div class="md-3 mt-3">
                    <?= 'Цена: ' . $model->price . "Р" ?>
                </div>

                <div class="mt-5 md-5">
                    <?= Html::radioList("Размер", null, [1 => "S", 2 => "M", 3 => "L"],) ?>
                    <!-- TODO список размеров? -->
                </div>

                <button class="mt-5 btn-info rounded-lg">В корзину</button>

                <div class="mt-5">
                    <?= $model->description ?>
                </div>
            </div>
        </div>
    </div>

    <div class="comment-create mt-5">
        <?php if (Yii::$app->user->isGuest): ?>
            <p4>
                Отзывы могут оставлять только зарегистрированные пользователи
            </p4>
        <?php else: ?>

            <?php $form = ActiveForm::begin(['action' => '/comment/create',]); ?>
            <?= $form->field($modelComment, 'mark')->radioList([1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5]) ?>
            <?= $form->field($modelComment, 'text')->textInput(['placeholder' => "Напишите свой отзыв здесь..."]) ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        <?php endif ?>
    </div><!-- comment-create -->

    <div class="mt-lg-5 container">
        <div class="h4">
            <?php echo ($model->comments) ? "Отзывы" : "Отзывов ещё нет" ?>
        </div>
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
