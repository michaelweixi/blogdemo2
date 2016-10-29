<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdminuserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adminuser-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增管理员', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'nickname',
            //'password',
            'email:email',
            // 'profile:ntext',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',

            ['class' => 'yii\grid\ActionColumn',
            		'template'=>'{view} {update} {resetpwd} {privilege}',
            		'buttons'=>[
            				'resetpwd'=>function($url,$model,$key)
            				{
            					$options=[
            							'title'=>Yii::t('yii','重置密码'),
            							'aria-label'=>Yii::t('yii','重置密码'),
            							'data-pjax'=>'0',
            							];
            					return Html::a('<span class="glyphicon glyphicon-lock"></span>',$url,$options);
            				},
            				
            				'privilege'=>function($url,$model,$key)
            				{
            					$options=[
            							'title'=>Yii::t('yii','权限'),
            							'aria-label'=>Yii::t('yii','权限'),
            							'data-pjax'=>'0',
            					];
            					return Html::a('<span class="glyphicon glyphicon-user"></span>',$url,$options);
            				},
            				
    ],
    ],
        ],
    ]); ?>
</div>
