<section id="aeronave" class="works clearfix">
	<div class="container">
		<div class="row">
			<div class="sec-title text-center">
				<h2>Aeronave</h2>
				<div class="devider"><i class="fa fa-fighter-jet fa-3x"></i></div>
				<div class="sec-sub-title text-center">
					<p>Aici se afla toate navele</p>
				</div>
				<div class="row text-center wow fadeInRight animated small-margin" data-wow-duration="500ms">
					<div class="col-md-5"></div>
					<div class="col-md-2">
						<button type="button" id="lansator-modal-adaugare" class="btn btn-info" style="z-index: 99999" data-target="#ModalAeronave" data-toggle="modal">
					 		Adauga Aeronava
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
				      <th class="text-center">Id Aeronava</th>
				      <th class="text-center">Nume Aeronava</th>
				      <th class="text-center">Gama Croaziera</th>
				    </tr>
				  </thead>
				  <tbody>
				  @foreach($aeronave as $i => $aeronava)
				  	<tr>
				  	  <td>{{ $i+1 }}</td>
			  		  <td>{{ $aeronava->idav  }}</td>
			  		  <td>{{ $aeronava->numeav  }}</td>
			  		  <td>{{ $aeronava->gama_croaziera  }}</td>
				  	</tr>
				  @endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="ModalAeronave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title label-modal" id="myModalLabel"></h4>
	      </div>
	        {!! Form::open(['url'=> URL::route('adauga-aeronava'), 'class' => 'form']) !!}
	      <div class="modal-body">
      		   {!! Form::label('idav', 'Id Aeronava') !!}
	           {!! Form::input('number' ,'idav', null, array('class'=>'form-control', 'placeholder' => "idav", 'required' => 'required')) !!} </br>
	           {!! Form::label('numeav', 'Nume Aeronava') !!}
   	           {!! Form::text('numeav', null, array('class'=>'form-control', 'placeholder' => "Nume aeronava", 'required' => 'required')) !!} </br>
   	           {!! Form::label('gama_croaziera', 'Gama Croaziera') !!}
   	           {!! Form::input('number', 'gama_croaziera', null, array('class'=>'form-control', 'placeholder' => "Gama Croaziera", 'required' => 'required')) !!} </br>


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