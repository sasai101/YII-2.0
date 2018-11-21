<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\ModulLeitetProfessor $model
 */

$this->title = 'Create Modul Leitet Professor';
$this->params['breadcrumbs'][] = ['label' => 'Modul Leitet Professors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modul-leitet-professor-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
