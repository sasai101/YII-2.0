<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\BenutzerAnmeldenKlausur $model
 */

$this->title = 'Update Benutzer Anmelden Klausur: ' . ' ' . $model->Benutzer_MarterikelNr;
$this->params['breadcrumbs'][] = ['label' => 'Benutzer Anmelden Klausurs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Benutzer_MarterikelNr, 'url' => ['view', 'Benutzer_MarterikelNr' => $model->Benutzer_MarterikelNr, 'KlausurID' => $model->KlausurID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="benutzer-anmelden-klausur-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
