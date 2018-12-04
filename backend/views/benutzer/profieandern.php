<?php
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Benutzer $model
 */

$this->title = 'Profieänderung';
$this->params['breadcrumbs'][] = ['label' => 'Benutzers', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->MarterikelNr, 'url' => ['view', 'id' => $model->MarterikelNr]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="benutzer-update">

    <h1><?= Html::encode($this->title) ?></h1>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>