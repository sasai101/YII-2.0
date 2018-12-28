<?php

/* @var $this yii\web\View */

use kartik\tabs\TabsX;
use yii\widgets\Pjax;
use common\models\BenutzerSuchen;
use common\models\MitarbeiterSuchen;
use common\models\KorrektorSuchen;
use common\models\ProfessorSuchen;
use common\models\TutorSuchen;

$searchModelBenutzer = new BenutzerSuchen;
$dataProviderBenutzer = $searchModelBenutzer->searchListview(Yii::$app->request->getQueryParams());

$searchModelMitarbeiter = new MitarbeiterSuchen();
$dataProviderMitarbeiter = $searchModelMitarbeiter->searchListview(Yii::$app->request->getQueryParams());

$searchModelKorrektor = new KorrektorSuchen();
$dataProviderKorrektor = $searchModelKorrektor->searchListview(Yii::$app->request->getQueryParams());

$searchModelTutor = new TutorSuchen();
$dataProviderTutur = $searchModelTutor->searchListview(Yii::$app->request->getQueryParams());

$searchModelProfessor = new ProfessorSuchen();
$dataProviderProfessor = $searchModelProfessor->searchListview(Yii::$app->request->getQueryParams());
?>
<div style="background-color:white">
<?php Pjax::begin(); echo TabsX::widget([
    'position'=>TabsX::POS_ABOVE,
    'encodeLabels'=>false,
    'bordered'=>true,
    //'encodeLabels'=>false,
    'items' => [
        [
            'label'=>'<span class="glyphicon glyphicon-home"></span> Home',
            'content' => $this->render('..\benutzer\hauptseite'),
            'active'=>true
        ],
        [
            'label'=>'<span class="glyphicon glyphicon-user"></span> Benutzer',
            'content' => $this->render('..\benutzer\listview',[
                'dataProvider' => $dataProviderBenutzer,
                'searchModel' => $searchModelBenutzer
            ]),
        ],
        [
            'label'=>'<span class="glyphicon glyphicon-user"></span> Mitarbeiter',
            'content' => $this->render('..\Mitarbeiter\listview',[
                'dataProvider' => $dataProviderMitarbeiter,
            ]),
            
        ],
        [
            'label'=>'<span class="glyphicon glyphicon-user"></span> Korrektor',
            'content' => $this->render('..\korrektor\listview',[
                'dataProvider' => $dataProviderKorrektor,
            ]),
        ],
        [
            'label'=>'<span class="glyphicon glyphicon-user"></span> Tutor',
            'content' => $this->render('..\tutor\listview',[
                'dataProvider' => $dataProviderTutur,
            ]),
        ],
        [
            'label'=>'<span class="glyphicon glyphicon-user"></span> Professor',
            'content' => $this->render('..\professor\listview',[
                'dataProvider' => $dataProviderProfessor,
            ]),
        ],
    ],
]);Pjax::end(); ?>

</div>
