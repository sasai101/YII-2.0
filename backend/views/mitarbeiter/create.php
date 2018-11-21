<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Mitarbeiter $model
 */

$this->title = 'Create Mitarbeiter';
$this->params['breadcrumbs'][] = ['label' => 'Mitarbeiters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mitarbeiter-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
