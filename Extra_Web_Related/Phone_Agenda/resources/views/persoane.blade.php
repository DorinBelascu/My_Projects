<!-- $persoana->denumire = denumirea grupului din care face parte persoana -->
<section id="persoane" class="team">
	<div class="container">
		<div class="row">
			<div class="sec-title text-center wow fadeInUp animated" data-wow-duration="700ms">
				<h2>Persoane</h2>
				<div class="devider"><i class="fa fa-male fa-lg"></i></div>
			</div>
			
			<div class="sec-sub-title text-center wow fadeInRight animated" data-wow-duration="500ms">
				<p>Aici se adauga persoane <span class="fa fa-plus-square"> </span></p>
				<button type="button" id="lansator-modal" class="btn btn-info">Adauga persoana</button>
			</div>


			@foreach($persoane as $i => $persoana)
				<!-- single member -->
				<figure class="team-member col-md-2 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-id="{{$persoana->id}}" data-nume="{{$persoana->nume}}" data-prenume="{{$persoana->prenume}}" data-telefon="{{$persoana->telefon}}" data-email="{{$persoana->email}}" data-grup="{{$persoana->denumire}}">
					<button type="button" class="btn btn-success btn-xs small-margin show-photo-form" data-id="{{$persoana->id}}">Adauga/Schimba Poza</button>
					<div class="member-thumb total-width" data-grup>
						<img src="img/persoane/{{ $persoana->poza }}" alt="" class="total-width img-responsive">
						<figcaption class="overlay">
							<h5 class="persoane_caption">Nume: {{ $persoana->nume }} </h5>
							<h5 class="persoane_caption">Prenume: {{ $persoana->prenume }} </h5>
							<p class="persoane_caption">Numar telefon: {{ $persoana->telefon }}</p>
							<button type="button" class="btn btn-danger btn-xs small-margin stergePersoana" title="Sterge pe {{$persoana->nume}} {{$persoana->prenume}}" aria-label="Left Align">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-success btn-xs small-margin editeazaPersoana" title="Editeaza" aria-label="Left Align">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</button>
						</figcaption>
					</div>
					<span> {{ $persoana->denumire }} <span class="fa fa-{{ $persoana->logo }} fa-2x"> </span> </span>
				</figure>

				<div id="accordion-{{ $persoana->id }}" class="row accordion-content">
	              	<div class="col-md-2">
		                <div style="width: 160px; text-align:center; margin:0px auto;">
		                  	<div class="fileinput fileinput-new" data-provides="fileinput">
		                      	<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 160px; height: 160px;">
		                      	</div>

		                     	{!! Form::open(['method'=>'post', 'files'=>true, 'url'=>URL::route('save-persoane-photo-upload', ['id'=>$persoana->id])]) !!}
		                     	<div>
		                        	<span class="btn btn-default btn-file">
			                          	<span class="fileinput-new">Selecteaza imaginea</span>
			                          	<span class="fileinput-exists">Schimba</span>
			                          	<input type="file" name="photo-persoana" />
		                        	</span>
		                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Sterge</a>
		                        <button class="btn btn-default fileinput-exists"> Incarca </button>
		                      	</div>
		                     	{!! Form::close() !!}
		                 	</div>
		                </div>
	               	</div>
	            </div>


				<!-- end single member -->
			@endforeach

			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title label-modal" id="myModalLabel"></h4>
			      </div>
			      <div class="modal-body">
			       
					  <div class="form-group">
					    <label for="exampleInputEmail1">Nume</label>
					    <input id="nume" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nume">
					    <span id="data-nume" class="help-block"></span>
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Prenume</label>
					    <input id="prenume" type="text" class="form-control" id="exampleInputEmail1" placeholder="Prenume">
					    <span id="data-prenume" class="help-block"></span>
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Email</label>
					    <input id="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
					    <span id="data-email" class="help-block"></span>
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Telefon</label>
					    <input id="telefon" type="text" class="form-control" id="exampleInputEmail1" placeholder="Telefon">
					    <span id="data-telefon" class="help-block"></span>
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Grup</label>
				    	<select id="grup" class="form-control" title="Introduceti un grup" >
					    	@foreach ($grupuri as $key => $grup) 
					    		<option><span class="fa fa-{{ $grup->logo }} fa-2x"></span>{{ $grup->denumire }}</option> 
					    	@endforeach
					    </select>
					    <span id="data-grup" class="help-block"></span>
					  </div>

					   <div id="actiune">add</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Inchide</button>
			        <button id="modal-adauga-editeaza-persoana" type="button" class="btn btn-info">Salveaza</button>
			      </div>
			    </div>
			  </div>
			</div>

			<!-- End Modal -->
		</div>
	</div>
</section>	