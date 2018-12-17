<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

?>


<?php Pjax::begin()?>
<div class="container-fluid" style="background-color:white">
	<div class="row-fluid">
		<div class="span12">
			<div class="tabbable" id="tabs-747944">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#panel-288582" data-toggle="tab">Teilname</a></li>
					<li ><a href="#panel-913776" data-toggle="tab">第二部分</a></li>
				</ul>


				<div class="tab-content">
					<div class="tab-pane active" id="panel-288582">
						<p>Alle Teilnamer von Übungsgruppe <?= $model->GruppenNr?>
						
						
						
						<div class="benutzer-index">

							<div class="row">
		
                    			<?php
                    
                                    Pjax::begin();
                                    echo ListView::widget([
                                        'id' => 'benutzerlist',
                                        'dataProvider' => $dataProvider,
                                        'itemView' => '_teilnahmerlist',
                                        'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
                                        'itemOptions' => [
                                            'tag' => 'div',
                                            'class' => 'col-md-1'
                                        ],
                                        // 'layout' => '{items} {pager}',
                                        'pager' => [
                                            'maxButtonCount' => 10,
                                            'nextPageLabel' => Yii::t('app', 'nächste'),
                                            'prevPageLabel' => Yii::t('app', 'vorne')
                                        ]
                                    ]);
                                    Pjax::end()?>
                    
                    			
                    		</div>

						</div>
					</div>
					<div class="tab-pane" id="panel-913776">
						<p>第二部分内容.</p>
					</div>
				</div>


			</div>
		</div>
	</div>
</div>
<?php Pjax::end()?>
