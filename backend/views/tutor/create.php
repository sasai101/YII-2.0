<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Tutor $model
 */

$this->title = 'Create Tutor';
$this->params['breadcrumbs'][] = ['label' => 'Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutor-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
