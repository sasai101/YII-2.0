<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\BenutzerAnmeldenKlausur $model
 */

$this->title = 'Create Benutzer Anmelden Klausur';
$this->params['breadcrumbs'][] = ['label' => 'Benutzer Anmelden Klausurs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="benutzer-anmelden-klausur-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
