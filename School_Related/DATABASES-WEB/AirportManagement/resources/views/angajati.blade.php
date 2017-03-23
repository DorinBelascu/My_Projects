<section id="angajati" class="works clearfix">
	<div class="container">
		<div class="row">
			<div class="sec-title text-center">
				<h2>Angajati</h2>
				<div class="devider"><i class="fa fa-users fa-3x"></i></div>
				<div class="sec-sub-title text-center">
					<p>Aici se afla toti angajatii</p>
				</div>
				<div class="row text-center wow fadeInRight animated small-margin" data-wow-duration="500ms">
					<div class="col-md-5"></div>
					<div class="col-md-2">
						<button type="button" id="lansator-modal-adaugare" class="btn btn-info" style="z-index: 99999" data-target="#ModalAngajati" data-toggle="modal">
					 		Adauga Angajat
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
				      <th class="text-center">Nume Angajat</th>
				      <th class="text-center">Salariu</th>
				      <th class="text-center">Data Nasterii</th>
				    </tr>
				  </thead>
				  <tbody>
				  @foreach($angajati as $i => $angajat)
				  	<tr>
				  	  <td>{{ $i+1 }}</td>
			  		  <td>{{ $angajat->idan  }}</td>
			  		  <td>{{ $angajat->numean  }}</td>
			  		  <td>{{ $angajat->salariu  }}</td>
			  		  <td>{{ $angajat->data_nasterii }}</td>
				  	</tr>
				  @endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="ModalAngajati" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title label-modal" id="myModalLabel"></h4>
	      </div>
	        {!! Form::open(['url'=> URL::route('adauga-angajat'), 'class' => 'form']) !!}
	      <div class="modal-body">
      		   {!! Form::label('idan', 'Id Angajat') !!}
	           {!! Form::input('number' ,'idan', null, array('class'=>'form-control', 'placeholder' => "idan", 'required' => 'required')) !!} </br>
	           {!! Form::label('numean', 'Nume Angajat') !!}
   	           {!! Form::text('numean', null, array('class'=>'form-control', 'placeholder' => "Nume Angajat", 'required' => 'required')) !!} </br>
   	           {!! Form::label('salariu', 'Salariu') !!}
   	           {!! Form::input('number', 'salariu', null, array('class'=>'form-control', 'placeholder' => "salariu", 'required' => 'required')) !!} </br>
   	           {!! Form::label('data_nasterii', 'Data Nasterii') !!}
   	           {!! Form::input('date' ,'data_nasterii', null, array('class'=>'form-control', 'placeholder' => "Data Nasterii", 'required' => 'required')) !!} </br>

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