<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Uebungsgruppe $model
 */

$this->title = 'Create Uebungsgruppe';
$this->params['breadcrumbs'][] = ['label' => 'Uebungsgruppes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uebungsgruppe-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
