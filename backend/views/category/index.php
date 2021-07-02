<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Category;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\Category */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <div class="panel panel-primary">
       <div class="panel-heading">
           <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
       </div>
       <div class="panel-body">
         <p class="pull-right">
            <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
           <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'header'=>'STT',
                'headerOptions'=>[
                    'style'=>'width:15px;text-align:center',
                ],
                'contentOptions'=>[
                    'style'=>'width:15px;text-align:center',
                ]
            ],
            ['class'=>'yii\grid\CheckBoxColumn'],
            [
                'attribute' => 'id',
                'label'=>'Id',
                 'headerOptions'=>[
                    'style'=>'width:15px;text-align:center',
                ],
                'contentOptions'=>[
                    'style'=>'width:15px;text-align:center',
                ]
            ],

            'name',
            'slug',
              [
                'attribute' => 'status',
                'content'=>function($model){
                    if($model->status==0){
                        return '<span class="label label-danger">Ẩn</span>';
                    }else{
                         return '<span class="label label-success">Kích hoạt</span>';
                    }
                },
                 'headerOptions'=>[
                    'style'=>'width:150px;text-align:center',
                ],
                'contentOptions'=>[
                    'style'=>'width:150px;text-align:center',
                ]
            ],
            [
                'attribute' => 'parent',
                'content'=>function($model){
                    if($model->parent==0){
                        return 'Root';
                    }else{
                        $parent = Category::find()->where(['id'=>$model->parent])->one();
                        if($parent){
                            return $parent->name;
                        }else{
                            return 'Không có';
                        }
                    }
                },
                 'headerOptions'=>[
                    'style'=>'width:150px;text-align:center',
                ],
                'contentOptions'=>[
                    'style'=>'width:150px;text-align:center',
                ]
            ],
            [
                'attribute' => 'created_at',
                'content'=>function($model){
                    return date('d-m-Y',$model->created_at);
                }
            ],
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn',
                'buttons'=>[
                    'view'=>function($url,$model){
                        return Html::a('View',$url,['class'=>'btn btn-xs btn-primary']);
                    },
                    'update'=>function($url,$model){
                        return Html::a('Edit',$url,['class'=>'btn btn-xs btn-warning']);
                    },
                    'delete'=>function($url,$model){
                        return Html::a('Delete',$url,
                            [
                                'class'=>'btn btn-xs btn-danger',
                                'data-confirm'=>'Bạn có chắc muốn xóa '.$model->name,
                                'data-method'=>'POST'
                            ]
                        );
                    },
                ]
            ],
        ],
    ]); ?>
       </div>
   </div>


</div>
