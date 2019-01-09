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
        <h3><?= Html::encode($this->title) ?></h3>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
