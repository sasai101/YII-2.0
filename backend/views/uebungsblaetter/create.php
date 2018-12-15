<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Uebungsblaetter $model
 */

$this->title = 'Übungsblätter erstellen';
$this->params['breadcrumbs'][] = ['label' => 'Uebungsblaetters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uebungsblaetter-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
