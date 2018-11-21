<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\ModulAnmeldenBenutzer $model
 */

$this->title = 'Create Modul Anmelden Benutzer';
$this->params['breadcrumbs'][] = ['label' => 'Modul Anmelden Benutzers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modul-anmelden-benutzer-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
