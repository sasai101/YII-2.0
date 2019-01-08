<?php



$this->title = 'Übungsgruppe '.$modelUebungsgruppe->GruppenNr;
$this->params['breadcrumbs'][] = ['label' => 'Alle Übungen', 'url' => ['uebungsgruppe/alleuebungen']];
$this->params['breadcrumbs'][] = ['label' => 'Alle Übungsgruppen', 'url' => ['uebungsgruppe/alleuebungsgruppe','id'=>$modelUebungsgruppe->UebungsID]];
$this->params['breadcrumbs'][] = ['label' => 'Übungsgruppe '.$modelUebungsgruppe->GruppenNr, 'url' => ['uebungsgruppe/gruppendetails','id'=>$modelUebungsgruppe->UebungsgruppeID]];
$this->params['breadcrumbs'][] = $modelBenutzer->Vorname." ".$modelBenutzer->Nachname;
?>

<div class="uebungsgruppe">

	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Titel -->
	
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>	


	<div class="row">
		<div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
			  <div>
			  	<div class="row">
			  		<div class="col-md-12">
			  		<div>
                		<h4>
                			Student: <b><?php echo $modelBenutzer->Vorname." ".$modelBenutzer->Nachname?></b>
                		</h4>
                	</div>
                	
                	<div>
                		<h4>
                			Übung: <b><?php echo $modelUebungsgruppe->uebungs->Bezeichnung ?></b>
                		</h4>
                	</div>
			  		</div>
			  	</div>
			  	
			  	<!-- leere Zeichen -->
			  	<div></br></div>
			  	<!-- leere Zeichen -->
			  	<div></br></div>
			  	
			  	<div class="row">
			  		<div class="col-md-6">
		  				<div class="panel panel-info">
                          <div class="panel-heading">Alle Teilnahmer</div>
                          <div class="panel-body">
                          	<div class="col-md-12">
                          	<!-- leere Zeichen -->
		  					<div></br></div>
		  					
                          	</div>
                          </div>
			  			</div>
			  			
			  		</div>
			  	</div>
			  	
			  	
			  	<div class="row">
			  		<div class="col-md-12">
		  				<div class="panel panel-warning">
                          <div class="panel-heading">Alle Abgabe</div>
                          <div class="panel-body">
							<div class="row">
								<div class="col-md-12">
								<!-- leere Zeichen -->
		  						<div></br></div>
									
								</div>
							</div>
						  </div>
                        </div>
		  			</div>
			  	</div>
			  	
			  	
			  </div>
			</div>
          </div>          
		</div>
	</div>
</div>