<?php 
use backend\controllers\ModulController;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'glyphicon glyphicon-user', 'url' => ['/gii']],
                    /*
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'glyphicon glyphicon-user', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    */
                    [
                        'label' => 'Hauptseite',
                        'icon' => 'bar-chart',
                        'url' => ['/benutzer/hauptseite'],
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
                        'items' => ModulController::Menue(),
                    ],
                    
                                        
                    [
                        'label' => 'Übung',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Übungsgruppe', 'icon' => 'group', 'url'=>['/uebungsgruppe/index']],
                            ['label' => 'Übungsabgabe', 'icon' => 'user', 'url'=>['/abgabe/index']],
                            ['label' => 'Einzelaufgabe', 'icon' => 'user', 'url'=>['/einzelaufgabe/index']],
                            ['label' => 'ÜbungsgruppeTeilnehmen', 'icon' => 'user', 'url'=>['/modul-anmelden-benutzer/index']],
                            ['label' => 'Übungsbältter', 'icon' => 'file-pdf-o', 'url'=>['/uebungsblaetter/index']],
                            ['label' => 'Übungen', 'icon' => 'user', 'url'=>['/uebung/index']]
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
