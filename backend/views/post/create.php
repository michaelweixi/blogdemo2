<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = '新增文章';
$this->params['breadcrumbs'][] = ['label' => '文章管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
