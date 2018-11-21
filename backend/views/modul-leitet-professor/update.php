<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\ModulLeitetProfessor $model
 */

$this->title = 'Update Modul Leitet Professor: ' . ' ' . $model->ModulID;
$this->params['breadcrumbs'][] = ['label' => 'Modul Leitet Professors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ModulID, 'url' => ['view', 'ModulID' => $model->ModulID, 'Professor_MarterikelNr' => $model->Professor_MarterikelNr]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="modul-leitet-professor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
