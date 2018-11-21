<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\ModulAnmeldenBenutzer $model
 */

$this->title = 'Update Modul Anmelden Benutzer: ' . ' ' . $model->ModulID;
$this->params['breadcrumbs'][] = ['label' => 'Modul Anmelden Benutzers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ModulID, 'url' => ['view', 'ModulID' => $model->ModulID, 'Benutzer_MarterikelNr' => $model->Benutzer_MarterikelNr]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="modul-anmelden-benutzer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
