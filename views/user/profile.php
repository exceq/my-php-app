<?php

use yii\widgets\ActiveForm;

/* @var $model app\models\User */
/* @var $form ActiveForm */

?>

<div class="container">
    <div class="row">
        <div class="col-md-3 ">
            <div class="list-group ">
                <a href="#" class="list-group-item list-group-item-action active">Профиль</a>
                <a href="/user/orders" class="list-group-item list-group-item-action">История заказов</a>


            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Ваш профиль</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <?= $this->render('_profileForm', [
                                'model' => $model,
                            ]) ?>

<!--                            old form -->
                            <div>

<!--                            <div>-->
<!---->
<!--                                --><?php //$form = ActiveForm::begin(['action' => 'update']) ?>
<!--                                <div class="form-group row">-->
<!--                                    <label for="username" class="col-4 col-form-label">User Name*</label>-->
<!--                                    <div class="col-8">-->
<!--                                        --><?php //$form->field($model, 'username')->textInput(['class' => 'form-control here']) ?>
<!---->
<!--                                        <input id="username" name="username" placeholder="Username"-->
<!--                                               class="form-control here" required="required" type="text">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group row">-->
<!--                                    <label for="name" class="col-4 col-form-label">First Name</label>-->
<!--                                    <div class="col-8">-->
<!--                                        <input id="name" name="name" placeholder="First Name" class="form-control here"-->
<!--                                               type="text">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group row">-->
<!--                                    <label for="lastname" class="col-4 col-form-label">Last Name</label>-->
<!--                                    <div class="col-8">-->
<!--                                        <input id="lastname" name="lastname" placeholder="Last Name"-->
<!--                                               class="form-control here" type="text">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group row">-->
<!--                                    <label for="text" class="col-4 col-form-label">Nick Name*</label>-->
<!--                                    <div class="col-8">-->
<!--                                        <input id="text" name="text" placeholder="Nick Name" class="form-control here"-->
<!--                                               required="required" type="text">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group row">-->
<!--                                    <label for="select" class="col-4 col-form-label">Display Name public as</label>-->
<!--                                    <div class="col-8">-->
<!--                                        <select id="select" name="select" class="custom-select">-->
<!--                                            <option value="admin">Admin</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group row">-->
<!--                                    <label for="email" class="col-4 col-form-label">Email*</label>-->
<!--                                    <div class="col-8">-->
<!--                                        <input id="email" name="email" placeholder="Email" class="form-control here"-->
<!--                                               required="required" type="text">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group row">-->
<!--                                    <label for="website" class="col-4 col-form-label">Website</label>-->
<!--                                    <div class="col-8">-->
<!--                                        <input id="website" name="website" placeholder="website"-->
<!--                                               class="form-control here" type="text">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group row">-->
<!--                                    <label for="publicinfo" class="col-4 col-form-label">public Info</label>-->
<!--                                    <div class="col-8">-->
<!--                                        <textarea id="publicinfo" name="publicinfo" cols="40" rows="4"-->
<!--                                                  class="form-control"></textarea>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group row">-->
<!--                                    <label for="newpass" class="col-4 col-form-label">new Password</label>-->
<!--                                    <div class="col-8">-->
<!--                                        <input id="newpass" name="newpass" placeholder="New Password"-->
<!--                                               class="form-control here" type="text">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group row">-->
<!--                                    <div class="offset-4 col-8">-->
<!--                                        <button name="submit" type="submit" class="btn btn-primary">Update My Profile-->
<!--                                        </button>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                --><?php //ActiveForm::end() ?>
<!---->
<!--                            </div>-->

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>