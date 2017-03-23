<section id="certificare" class="works clearfix">
	<div class="container">
		<div class="row">
			<div class="sec-title text-center">
				<h2>Certificare </h2>
				<div class="devider"><i class="fa fa-file-o fa-3x"></i></div>
				<div class="sec-sub-title text-center">
					<p>Aici puteti vedea toate certificarile</p>
				</div>
				<div class="row text-center wow fadeInRight animated small-margin" data-wow-duration="500ms">
					<div class="col-md-5"></div>
					<div class="col-md-2">
						<button type="button" id="lansator-modal-adaugare" class="btn btn-info" style="z-index: 99999" data-target="#ModalCertificare" data-toggle="modal">
					 		Adauga Certificare
						</button>
					</div>
					<div class="col-md-5">
					</div>
				</div>
				@if($errors->has())
				   @foreach ($errors->all() as $error)
				      <div class="text-danger">{{ $error }}</div>
				  @endforeach
				@endif
				<table class="table" style="margin : 30px;">
				  <thead>
				    <tr class="text-center">
				    	<th class="text-center">#</th>
				      <th class="text-center">Id Angajat</th>
				      <th class="text-center">Id Aeronava</th>
				    </tr>
				  </thead>
				  <tbody>
				  @foreach($certificari as $i => $certificare)
				  	<tr>
				  	  <td>{{ $i+1  }}</td>
			  		  <td>{{ $certificare->idan  }}</td>
			  		  <td>{{ $certificare->idav  }}</td>
				  	</tr>
				  @endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="ModalCertificare" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title label-modal" id="myModalLabel"></h4>
	      </div>
	        {!! Form::open(['url'=> URL::route('adauga-certificare'), 'class' => 'form']) !!}
	      <div class="modal-body">
      		   {!! Form::label('idan', 'Id Angajat') !!}
               {!! Form::select('idan', $idanArray, Input::old('Care angajat?') , array('class'=>'form-control', 'data-toggle'=>'tooltip', 'title' => "Alegeti Angajatul", ))!!} </br>
      		   {!! Form::label('idav', 'Id Aeronava') !!}
               {!! Form::select('idav', $idavArray, Input::old('Care aeronava?') , array('class'=>'form-control', 'data-toggle'=>'tooltip', 'title' => "Alegeti Aeronava", ))!!} </br>


	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Inchide</button>
		  	{!! Form::submit('Adauga', array('id' =>'btn-adauga-zbor', 'class' => "btn btn-success")) !!}    
	      </div>
	        {!! Form::close() !!}
	    </div>
	  </div>
	</div>
	<!-- End Modal -->	
</section>