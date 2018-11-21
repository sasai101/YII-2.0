<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Korrektor $model
 */

$this->title = 'Create Korrektor';
$this->params['breadcrumbs'][] = ['label' => 'Korrektors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="korrektor-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
