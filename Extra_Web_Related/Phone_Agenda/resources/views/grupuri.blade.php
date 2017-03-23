<?php 
	$vector_simboluri = [ 'briefcase', 'bicycle', 'automobile', 'beer', 'bolt', 'camera', 'legal', 'child', 'anchor', 'futbol-o', 'laptop', 'home', 'institution' ];
?>
<section id="grupuri" class="works clearfix">
	<div class="container">
		<div class="row">

			<div class="sec-title text-center">
				<h2>Grupuri</h2>
				<div class="devider"><i class="fa fa-group fa-lg"></i></div>
			</div>
			
			<div class="sec-sub-title text-center">
				<p>Aici puteti vedea toate grupurile existente</p>
			</div>
			<div class="row text-center wow fadeInRight animated small-margin" data-wow-duration="500ms">
				<div class="col-md-5"></div>
				<div class="col-md-2">
					<button type="button" id="lansator-modal-adaugare" class="btn btn-info" style="z-index: 99999">
				 		Adauga Grup
					</button>
				</div>
				<div class="col-md-5">
				</div>
			</div>
			<div class="work-filter wow fadeInRight animated" data-wow-duration="500ms">
				<ul class="text-center">
					<li >
						<a href="javascript:;" data-filter="all" class="active filter">Toate</a>
					</li>
					@foreach($grupuri as $i => $grup)
						<li>
							<a href="javascript:;" data-filter=".{{$grup->id}}" class="filter" style="margin:10px 0px 0px 0px;">{{$grup->denumire }} <span class="fa fa-{{ $grup->logo }} fa-lg"></span></a>
							<button type="button" style="z-index: 99999" class="btn btn-danger btn-xs small-margin stergeGrup" data-id="{{$grup->id}}" title="Sterge grupul {{ $grup->denumire }}" aria-label="Left Align">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-success btn-xs small-margin editeazaGrup" title="Editeaza" data-id="{{ $grup->id }}" aria-label="Left Align" data-denumire="{{ $grup->denumire }}" data-simbol="{{ $grup->logo }}">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</button>
						</li>
					@endforeach
				</ul>
			</div>
			
		</div>

		<div class="row">
			<div class="project-wrapper">
				@foreach($grupuri as $i => $grup)
					@foreach($persoane as $key => $persoana)
						@if($persoana->denumire == $grup->denumire)
						<div class="col-md-2">
							<figure class="mix work-item {{$grup->id}} total-width" >
								<img src="img/persoane/{{ $persoana->poza }}" alt="" class="total-width">
								<figcaption class="overlay">
									<span class="fa fa-{{ $grup->logo }} fa-3x"> </span>
									<h4 class="persoane_caption">{{ $persoana->nume }}</h4>
									<h4 class="persoane_caption">{{ $persoana->prenume }}</h4>
									<p class="persoane_caption">Numar telefon: {{ $persoana->telefon }}</p>
								</figcaption>
							</figure>
						</div>
						@endif
					@endforeach
				@endforeach
			</div>
		</div>


		<!-- Modal -->
		<div class="modal fade" id="modal-grup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title label-modal" id="myModalLabel"></h4>
		      </div>
		      <div class="modal-body">
		       
				  <div class="form-group">
					  <div>
						    <label for="denumire-label">Denumire</label>
						    <input id="denumire" type="text" class="form-control" id="denumire-label" placeholder="Denumire Grup">
						    <span id="data-denumire" class="help-block"></span>
					  </div>
				  </div>

				  <div class="row small-margin">
				  	<div class="text-center small-margin">
				  		<h4>Selecteaza simbol</h4>
				  	</div>
				  	<div>
					  	<span id="simbol"></span>
					  	<span id="data-simbol" class="help-block"></span>
					  	@for( $i = 0; $i < 12; $i++ )
					  		<div class="col-md-3 text-center btn btn-danger simbol-grup" data-simbol="{{ $vector_simboluri[$i] }}"><span class="fa fa-{{ $vector_simboluri[$i] }}  fa-3x"></span></div>
					  	@endfor
					</div>
				  </div>

				   <div id="actiune" class="ascuns">add</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Inchide</button>
		        <button id="modal-adauga-editeaza-grup" type="button" class="btn btn-info">Salveaza</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- End Modal -->
	</div>
</section>