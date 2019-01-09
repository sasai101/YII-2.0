<?php 
use backend\controllers\ModulController;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::$app->user->identity->Profiefoto ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo Yii::$app->user->identity->Vorname." ".Yii::$app->user->identity->Nachname; ?></p>
            </div>
        </div>

        
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                
                'items' => [
                    ['label' => 'Menu Leistungssystem', 'options' => ['class' => 'header']],
                    
                    [
                        'label' => 'Hauptseite',
                        'icon' => 'bar-chart',
                        'url' => ['/site/index'],
                    ],
                    // Benutzer Menue
                    [
                        'label' => 'Alle Benutzer',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Alle Benutzer', 'icon' => 'user', 'url'=>['/benutzer/index']],
                            ['label' => 'Mitarbeiter', 'icon' => 'user', 'url'=>['/mitarbeiter/index']],
                            ['label' => 'Professor', 'icon' => 'user', 'url'=>['/professor/index']],
                            ['label' => 'Tutor', 'icon' => 'user', 'url'=>['/tutor/index']],
                            ['label' => 'Korrektor', 'icon' => 'user', 'url'=>['/korrektor/index']]
                        ],
                    ],
                    // Dynamische Meue für Modul
                    [
                        'label' => 'Modul',
                        'icon' => 'mortar-board',
                        'url' => ['/modul/index'],
                        // Aufruf von der funkiton Menue() in ModulControlle-Klasse
                        //'items' => ModulController::Menue(),
                    ],
                    
                                        
                    [
                        'label' => 'Übung',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            //['label' => 'Übungsabgabe', 'icon' => 'user', 'url'=>['/abgabe/index']],
                            //['label' => 'Einzelaufgabe', 'icon' => 'user', 'url'=>['/einzelaufgabe/index']],
                            //['label' => 'ÜbungsgruppeTeilnehmen', 'icon' => 'user', 'url'=>['/modul-anmelden-benutzer/index']],
                            ['label' => 'Übungsbältter', 'icon' => 'file-pdf-o', 'url'=>['/uebung/alleuebungen']],
                            ['label' => 'Übungsgruppe', 'icon' => 'group', 'url'=>['/uebung/alleuebungsgruppe']],
                            //['label' => 'Übungen', 'icon' => 'user', 'url'=>[]]
                        ],
                    ],
                    
                    // Anteil des Klausures
                    [
                        'label' => 'Klausur',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Klausurerstellung', 'icon' => 'group', 'url'=>['/klausur/klausurlistview']],
                            ['label' => 'Klausuranmeldung', 'icon' => 'user', 'url'=>['/benutzer-anmelden-klausur/klausuranmeldunglistview']],
                            ['label' => 'Note eintragen', 'icon' => 'user', 'url'=>['/klausurnote/klausurnotelistview']],
                        ],
                    ],
                    
                    //Profe Aederung
                    [
                        'label' => 'Profie',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Profiepasswort veranderung', 'icon' => 'group', 'url'=>['/benutzer/profiepassword']],
                            ['label' => 'Profieänderung', 'icon' => 'user', 'url'=>['/benutzer/profieandern']],
                        ],
                    ],
                   
                ],
            ]
        ) ?>

    </section>

</aside>
