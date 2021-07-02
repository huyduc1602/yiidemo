<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Category;
/* @var $this yii\web\View */
/* @var $model backend\models\category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(
        [
            1=>'Kích hoạt',
            0=>'Không kích hoạt'
        ],
        [
            'prompt'=>'Chọn trạng thái'
        ]
    ) ?>
    <?php 
    $cat =  new Category();
     ?>
    <?= $form->field($model, 'parent')->dropDownList(
        $cat->getParent(),
        ArrayHelper::map(Category::find()->all(),'id','name'),
        [
            'prompt'=>'Danh mục cha'
        ]
    ) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
