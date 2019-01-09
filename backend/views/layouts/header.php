<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Mitarbeiter;

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

                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                    <?php if(Mitarbeiter::findOne(Yii::$app->user->identity->MarterikelNr)!= null):?>
                        <li class="header">You have 4 messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="<?= Yii::$app->user->identity->Profiefoto ?>" class="img-circle"
                                                 alt="User Image"/>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                        <?php endif;?>
                    </ul>
                </li>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Very long description here that may
                                        not fit into the page and may cause design problems
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i> 5 new members joined
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> You changed your username
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                
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

