<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\BenutzerTeilnimmtUebungsgruppe $model
 */

$this->title = 'Update Benutzer Teilnimmt Uebungsgruppe: ' . ' ' . $model->Benuter_MarterikelNr;
$this->params['breadcrumbs'][] = ['label' => 'Benutzer Teilnimmt Uebungsgruppes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Benuter_MarterikelNr, 'url' => ['view', 'Benuter_MarterikelNr' => $model->Benuter_MarterikelNr, 'UebungsgruppeID' => $model->UebungsgruppeID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="benutzer-teilnimmt-uebungsgruppe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
