<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Modul $model
 */

$this->title = 'Create Modul';
$this->params['breadcrumbs'][] = ['label' => 'Moduls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modul-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_dynamicForm', [
        'modelModul' => $modelModul,
        'modelsProfessor' => $modelsProfessor
    ]) ?>

</div>
