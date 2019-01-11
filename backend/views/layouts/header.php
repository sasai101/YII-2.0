<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Mitarbeiter;
use phpDocumentor\Reflection\Types\Null_;
use common\models\Klausur;
use common\models\Klausurnote;
use common\models\Uebung;
use common\models\Korrektor;
use common\models\Uebungsgruppe;
use common\models\Abgabe;
use common\models\Benutzer;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . "Studierendes System" . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
            
            <!-- Für Mitarbeiter -->
            <?php if(Mitarbeiter::findOne(Yii::$app->user->identity->MarterikelNr)!= null):?>
                <!-- Klausurnote -->
            	<li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning"><?php echo Klausurnote::AnzahlKlausuren(Yii::$app->user->identity->MarterikelNr);?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"><?php echo Klausurnote::AnzahlKlausuren(Yii::$app->user->identity->MarterikelNr);?> Klausurnote sollen Sie noch eintragen;</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                            	<?php $alleKlausur = Klausur::find()->where(['Mitarbeiter_MarterikelNr'=>Yii::$app->user->identity->MarterikelNr])->all();?>
                            	<?php foreach ($alleKlausur as $klausur):?>
                                	<?php if (\common\models\Klausurnote::find()->where(['KlausurID'=>$klausur->KlausurID,'Punkt'=>null])->count()!=0):?>
                                		<?php $anzahl = \common\models\Klausurnote::find()->where(['KlausurID'=>$klausur->KlausurID,'Punkt'=>null])->count()?>
                                        <?php $modul = $klausur->modul->Bezeichnung?> 
                                        <li>
                                            <?php echo Html::a("<i class='fa fa-users text-aqua'></i> $anzahl  Klausurnote 
                                            <p>von Klausur des Modules $modul nicht eingetragen</p>",['klausurnote/index', 'id'=>$klausur->KlausurID])?>
                                        </li>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </ul>
                        </li>
                    </ul>
                </li>
                
                <!-- Übungsgruppe -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning"><?php echo Mitarbeiter::AnzahlunkorregierteAbgabe(Yii::$app->user->identity->MarterikelNr);?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"><?php echo Mitarbeiter::AnzahlunkorregierteAbgabe(Yii::$app->user->identity->MarterikelNr);?> Abgabe noch nicht korregiert;</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                            	<?php $alleUebung = Uebung::find()->where(['Mitarbeiter_MarterikelNr'=>Yii::$app->user->identity->MarterikelNr])->all();?>
                            	<?php foreach ($alleUebung as $uebung):?>
                                	<?php foreach ($uebung->uebungsgruppes as $gruppe):?>
                                    	<?php if (\common\models\Uebungsgruppe::AnzahlUnkorreigiteGruppe($gruppe->UebungsgruppeID)!=0):?>
                                    		<?php $anzahl = \common\models\Uebungsgruppe::AnzahlUnkorreigiteGruppe($gruppe->UebungsgruppeID)?>
                                            <?php $modul = $gruppe->uebungs->modul->Bezeichnung?> 
                                            <?php $gruppen = $gruppe->GruppenNr?>
                                            <li>
                                                <?php echo Html::a("<i class='fa fa-users text-aqua'></i> $anzahl unkorregierte Abgabe 
                                                <p>von Gruppe $gruppen des Modules $modul nicht eingetragen</p>",['uebungsgruppe/gruppendetails', 'id'=>$gruppe->UebungsgruppeID])?>
                                            </li>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                <?php endforeach;?>
                            </ul>
                        </li>
                    </ul>
                </li>
            
            <?php endif;?>
            
            <!-- Korrektor -->
            <?php if(Korrektor::findOne(Yii::$app->user->identity->MarterikelNr)!= null):?>
                <!-- Abgabe -->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success"><?php echo Korrektor::AnzahlUnkorregiertAbgabe(Yii::$app->user->identity->MarterikelNr)?></span>
                    </a>
                    <ul class="dropdown-menu">
                    	<?php foreach (Korrektor::AlleUebungsgruppe(Yii::$app->user->identity->MarterikelNr) as $grupp):?>
                            <li class="header">Sie habe <?php echo Uebungsgruppe::AnzahlUnkorreigiteGruppe($grupp->UebungsgruppeID)?> Abgabe von Gruppe <?php echo $grupp->GruppenNr?> noch nicht korregiert</li>
                            <li>
                                <!-- Alle abgabe -->
                                <ul class="menu">
                                	<?php foreach (Abgabe::AlleAbgabeVonGrup($grupp->UebungsgruppeID) as $abgabe):?>
                                    <li><!-- EinzelAbgabe -->
                                    	<?php $benutzer = Benutzer::findOne($abgabe->Benutzer_MarterikelNr)?>
                                    	<?php $proffoto = $benutzer->Profiefoto?>
                                    	<?php $blattNr = $abgabe->uebungsblaetter->UebungsNr?>
                                    	<?php $ubung = $abgabe->uebungsblaetter->uebungs->Bezeichnung?>
                                    	<?php $abgabezeit = date('d-m-Y',$abgabe->AbgabeZeit)?>
                                    	
                                    	<?php echo Html::a("
                                    	    <div class='pull-left'>
                                    	    <img src='$proffoto' class='img-circle'
                                    	    alt='User Image'/>
                                    	    </div>
                                    	    <h4>
                                    	    Übungsblatt $blattNr
                                    	    <small><i class='fa fa-clock-o'></i> $abgabezeit</small>
                                    	    </h4>
                                    	    <p>Von Übung $ubung</p>"
                                    	    ,['abgabe/update','id'=>$abgabe->AbgabeID],['title' => Yii::t('yii', 'Edit'),])?>
                                    	
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </li>
                            <?php $gruppeNr = $grupp->GruppenNr?>
                            <li class="footer"><?php echo Html::a("Alle Abgabe von Gruppe $gruppeNr ansehen",['uebungsgruppe/gruppendetails', 'id'=>$grupp->UebungsgruppeID])?></li>
                        <?php endforeach;?>
                    </ul>
                </li>
            <?php endif;?>
            
                       
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= Yii::$app->user->identity->Profiefoto ?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">
								<?php 
                            	   echo Yii::$app->user->identity->Vorname." ".Yii::$app->user->identity->Nachname;
                            	?>
						</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= Yii::$app->user->identity->Profiefoto ?>" class="img-circle"
                                 alt="User Image"/>

                            <p>
                            	<?php 
                            	   echo Yii::$app->user->identity->Vorname." ".Yii::$app->user->identity->Nachname;
                            	?>
                                <small>
                                	Marterkel Nr:
                                	<?php 
                                	   echo Yii::$app->user->identity->MarterikelNr;
                                	?>	
                                </small>
                                
                            </p>
                        </li>
                        
                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                            <!-- 
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                -->
                                <p>
                                 <?= Html::button('Profie',['value'=>Url::to('index.php?r=benutzer/profieview'),'class' =>'btn btn-default','id' => 'modalButton'])?>
                                 </p>
                            </div>
                                 
                            <div class="pull-right">
                                <?= Html::a(
                                    'Logg aus',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                );?>
                            </div>
                        </li>
                    </ul>
                </li>
                               
				<!--
				    <!-- User Account: style can be found in dropdown.less
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
    			-->
            </ul>
        </div>
    </nav>
</header>

    <!-- 
        Modal-Fenster für Profieveränderung 
    -->
    <?php
        Modal::begin([
            'header' => '<div class="row">
                            <div class="col-xs-12 col-md-4"><img src="../../modul/HHU.png" class="img-rounded" alt="user image" height = "90" width="180"/></div>
                            <div class="col-xs-6 col-md-8"><h1><b>Studierenden System</b></h1></div>
                         </div>',
            'id' => 'modal',
            'size' => 'modal-lg',
        ]);
        echo "<div id='modalContent'></div>";
        Modal::end();
    ?> 

