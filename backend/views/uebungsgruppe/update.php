<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Uebungsgruppe $model
 */

$this->title = 'Update Uebungsgruppe: ' . ' ' . $model->UebungsgruppeID;
$this->params['breadcrumbs'][] = ['label' => 'Uebungsgruppes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->UebungsgruppeID, 'url' => ['view', 'id' => $model->UebungsgruppeID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="uebungsgruppe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
