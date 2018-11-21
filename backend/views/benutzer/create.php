<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Benutzer $model
 */

$this->title = 'Create Benutzer';
$this->params['breadcrumbs'][] = ['label' => 'Benutzers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="benutzer-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
