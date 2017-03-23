<section id="zboruri" class="works clearfix">
	<div class="container">
		<div class="row">
			<div class="sec-title text-center">
				<h2>Zboruri</h2>
				<div class="devider"><i class="fa fa-paper-plane fa-3x"></i></div>
				<div class="sec-sub-title text-center">
					<p>Aici puteti vedea toate zborurile existente</p>
				</div>
				<div class="row text-center wow fadeInRight animated small-margin" data-wow-duration="500ms">
					<div class="col-md-5"></div>
					<div class="col-md-2">
						<button type="button" id="lansator-modal-adaugare" class="btn btn-info" style="z-index: 99999"data-target="#ModalZboruri" data-toggle="modal">
					 		Adauga Zbor
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
				      <th class="text-center">nrz</th>
				      <th class="text-center">De_La</th>
				      <th class="text-center">La</th>
				      <th class="text-center">Distanta</th>
				      <th class="text-center">Plecare</th>
				      <th class="text-center">Sosire</th>
				    </tr>
				  </thead>
				  <tbody>
				  @foreach($zboruri as $i => $zbor)
				  	<tr>
				  	  <td>{{ $i+1  }}</td>
			  		  <td>{{ $zbor->nrz  }}</td>
			  		  <td>{{ $zbor->de_la  }}</td>
			  		  <td>{{ $zbor->la  }}</td>
			  		  <td>{{ $zbor->distanta  }}</td>
			  		  <td>{{ $zbor->plecare  }}</td>
			  		  <td>{{ $zbor->sosire  }}</td>
				  	</tr>
				  @endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="ModalZboruri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title label-modal" id="myModalLabel"></h4>
	      </div>
	        {!! Form::open(['url'=> URL::route('adauga-zbor'), 'class' => 'form']) !!}
	      <div class="modal-body">
      		   {!! Form::label('nrz', 'Numar Zbor') !!}
	           {!! Form::input('number' ,'nrz', null, array('class'=>'form-control', 'placeholder' => "nrz", 'required' => 'required')) !!} </br>
	           {!! Form::label('de_la', 'De La') !!}
   	           {!! Form::text('de_la', null, array('class'=>'form-control', 'placeholder' => "de_la", 'required' => 'required')) !!} </br>
   	           {!! Form::label('la', 'La') !!}
   	           {!! Form::text('la', null, array('class'=>'form-control', 'placeholder' => "la", 'required' => 'required')) !!} </br>
   	           {!! Form::label('distanta', 'Distanta') !!}
   	           {!! Form::input('number' ,'distanta', null, array('class'=>'form-control', 'placeholder' => "distanta", 'required' => 'required')) !!} </br>
   	           {!! Form::label('plecare', 'Data Plecarii') !!}
   	           {!! Form::input('date', 'plecare', null, array('class'=>'form-control', 'placeholder' => "plecare", 'required' => 'required')) !!} </br>
   	           {!! Form::label('sosire', 'Data Sosirii') !!}
   	           {!! Form::input('date','sosire', null, array('class'=>'form-control', 'placeholder' => "sosire", 'required' => 'required')) !!} </br>

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