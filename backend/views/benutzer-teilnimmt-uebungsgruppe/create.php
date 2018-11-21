<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\BenutzerTeilnimmtUebungsgruppe $model
 */

$this->title = 'Create Benutzer Teilnimmt Uebungsgruppe';
$this->params['breadcrumbs'][] = ['label' => 'Benutzer Teilnimmt Uebungsgruppes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="benutzer-teilnimmt-uebungsgruppe-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
