<?php $interogare_5_0Array = ['Min', 'Max'];?>
@if(Session::has('result'))
	<?php 
		$result = Session::get('result'); 
		$interogationNumber = Session::get('interogationNumber');
	?>
@endif

<section id="interogari" class="works clearfix">
	<div class="container">
		<div class="row">
			<div class="sec-title text-center">
				<h2>Interogari</h2>
				<div class="devider"><i class="fa fa-database fa-3x"></i></div>
				<div class="sec-sub-title text-center">
					<p>Aici sunt interogarile</p>
				</div>
				@if($errors->has())
				   @foreach ($errors->all() as $error)
				      <div class="text-danger">{{ $error }}</div>
				  @endforeach
				@endif

			</div>
		</div>
	</div>
	<div class="row text-center wow fadeInRight animated small-margin" data-wow-duration="500ms">
	<div class="col-md-1"></div>
	@foreach($interogationsArray as $i => $interogation)
		<div class="col-md-1">
			<button type="button" id="buttonInterogare{{$i}}" class="btn btn-info" style="z-index: 99999" data-target="#ModalInterogare{{$i}}" data-toggle="modal">
		 		Interogare{{$i+1}}
			</button>
		</div>

	@endforeach

</div>
	
@if(Session::has('result'))
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<table class="table">
		  <thead>
		    <tr class="text-center">
		      <th class="text-center">#</th>
		      @foreach($interogationsResultTableTH[$interogationNumber] as $i => $interogationResultTableTH)
		      	<th class="text-center">{{$interogationResultTableTH}}</th>
		      @endforeach
		    </tr>
		  </thead>
		  <tbody>
		  @foreach($result as $i => $resultRow)
		  	<tr>
		  	  <td class="text-center">{{$i}}</td>
		  	  @foreach($resultRow as $j => $resultTD)
		  	  <td class="text-center">{{$resultTD}}</td>
		  	  @endforeach
		  	</tr>
		  @endforeach
		  </tbody>
		</table>
	</div>		
</div>
@endif




<!-- Modal Interogare 0-->
<div class="modal fade" id="ModalInterogare0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title label-modal" id="myModalLabel"></h4>
        {{$interogationsArray[0]}}
      </div>
        {!! Form::open(['url'=> URL::route('interogare-0'), 'class' => 'form']) !!}
      <div class="modal-body">

           {!! Form::label('interogare_0_0', 'Care sa fie primele 3 litere') !!}
           {!! Form::text('interogare_0_0', null, array('class'=>'form-control', 'placeholder' => "Litere de inceput", 'required' => 'required')) !!} </br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Inchide</button>
	  	{!! Form::submit('Interogheaza', array('id' =>'btn-adauga-zbor', 'class' => "btn btn-success")) !!}    
      </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- End Modal Interogare 0-->


<!-- Modal Interogare 1 -->
<div class="modal fade" id="ModalInterogare1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title label-modal" id="myModalLabel"></h4>
        {{$interogationsArray[1]}}
      </div>
        {!! Form::open(['url'=> URL::route('interogare-1'), 'class' => 'form']) !!}
      <div class="modal-body">

		{!! Form::label('interogare_1_0', 'Limita Superioara') !!}
	    {!! Form::input('number' ,'interogare_1_0', null, array('class'=>'form-control', 'placeholder' => "Limita Superioara", 'required' => 'required')) !!} </br>
	    {!! Form::label('interogare_1_1', 'Limita Inferioara') !!}
	    {!! Form::input('number' ,'interogare_1_1', null, array('class'=>'form-control', 'placeholder' => "Limita Inferioara", 'required' => 'required')) !!} </br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Inchide</button>
	  	{!! Form::submit('Interogheaza', array('id' =>'btn-adauga-zbor', 'class' => "btn btn-success")) !!}    
      </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- End Modal Interogare 1 -->


<!-- Modal Interogare 2 -->
<div class="modal fade" id="ModalInterogare2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title label-modal" id="myModalLabel"></h4>
        {{$interogationsArray[2]}}
      </div>
        {!! Form::open(['url'=> URL::route('interogare-2'), 'class' => 'form']) !!}
      <div class="modal-body">

       {!! Form::label('interogare_2_0', 'Care sa fie primele 3 litere ale navei') !!}
       {!! Form::text('interogare_2_0', null, array('class'=>'form-control', 'placeholder' => "3 litere de inceput", 'required' => 'required')) !!} </br>

       {!! Form::label('interogare_2_1', 'Sau care sa fie primele 6 litere ale navei') !!}
       {!! Form::text('interogare_2_1', null, array('class'=>'form-control', 'placeholder' => "6 litere de inceput", 'required' => 'required')) !!} </br>           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Inchide</button>
	  	{!! Form::submit('Interogheaza', array('id' =>'btn-adauga-zbor', 'class' => "btn btn-success")) !!}    
      </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- End Modal Interogare 2 -->

<!-- Modal Interogare 3 -->
<div class="modal fade" id="ModalInterogare3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title label-modal" id="myModalLabel"></h4>
        {{$interogationsArray[3]}}
      </div>
        {!! Form::open(['url'=> URL::route('interogare-3'), 'class' => 'form']) !!}
      <div class="modal-body">      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Inchide</button>
	  	{!! Form::submit('Interogheaza', array('id' =>'btn-adauga-zbor', 'class' => "btn btn-success")) !!}    
      </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- End Modal Interogare 3 -->

<!-- Modal Interogare 4 -->
<div class="modal fade" id="ModalInterogare4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title label-modal" id="myModalLabel"></h4>
        {{$interogationsArray[4]}}
      </div>
        {!! Form::open(['url'=> URL::route('interogare-4'), 'class' => 'form']) !!}
      <div class="modal-body">     
	       {!! Form::label('interogare_4_0', 'De La') !!}
	       {!! Form::text('interogare_4_0', null, array('class'=>'form-control', 'placeholder' => "De La", 'required' => 'required')) !!} </br>

	       {!! Form::label('interogare_4_1', 'Pana La') !!}
	       {!! Form::text('interogare_4_1', null, array('class'=>'form-control', 'placeholder' => "Pana La", 'required' => 'required')) !!} </br>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Inchide</button>
	  	{!! Form::submit('Interogheaza', array('id' =>'btn-adauga-zbor', 'class' => "btn btn-success")) !!}    
      </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- End Modal Interogare 4 -->

<!-- Modal Interogare 5 -->
<div class="modal fade" id="ModalInterogare5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title label-modal" id="myModalLabel"></h4>
        {{$interogationsArray[5]}}
      </div>
        {!! Form::open(['url'=> URL::route('interogare-5'), 'class' => 'form']) !!}
      <div class="modal-body">     
		   {!! Form::label('interogare_5_0', 'Id Angajat') !!}
	       {!! Form::select('interogare_5_0', $interogare_5_0Array, Input::old('Min sau Max?') , array('class'=>'form-control', 'data-toggle'=>'tooltip', 'title' => "Alegeti Optiune", ))!!} </br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Inchide</button>
	  	{!! Form::submit('Interogheaza', array('id' =>'btn-adauga-zbor', 'class' => "btn btn-success")) !!}    
      </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- End Modal Interogare 5 -->

<!-- Modal Interogare 6 -->
<div class="modal fade" id="ModalInterogare6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title label-modal" id="myModalLabel"></h4>
        {{$interogationsArray[6]}}
      </div>
        {!! Form::open(['url'=> URL::route('interogare-6'), 'class' => 'form']) !!}
      <div class="modal-body">     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Inchide</button>
	  	{!! Form::submit('Interogheaza', array('id' =>'btn-adauga-zbor', 'class' => "btn btn-success")) !!}    
      </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- End Modal Interogare 6 -->

<!-- Modal Interogare 7 -->
<div class="modal fade" id="ModalInterogare7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title label-modal" id="myModalLabel"></h4>
        {{$interogationsArray[7]}}
      </div>
        {!! Form::open(['url'=> URL::route('interogare-7'), 'class' => 'form']) !!}
      <div class="modal-body">     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Inchide</button>
	  	{!! Form::submit('Interogheaza', array('id' =>'btn-adauga-zbor', 'class' => "btn btn-success")) !!}    
      </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- End Modal Interogare 7 -->

<!-- Modal Interogare 8 -->
<div class="modal fade" id="ModalInterogare8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title label-modal" id="myModalLabel"></h4>
        {{$interogationsArray[8]}}
      </div>
        {!! Form::open(['url'=> URL::route('interogare-8'), 'class' => 'form']) !!}
      <div class="modal-body"> 
         {!! Form::label('interogare_8_0', 'Nume aeronava') !!}
         {!! Form::text('interogare_8_0', null, array('class'=>'form-control', 'placeholder' => "Nume aeronava", 'required' => 'required')) !!} </br>      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Inchide</button>
      {!! Form::submit('Interogheaza', array('id' =>'btn-adauga-zbor', 'class' => "btn btn-success")) !!}    
      </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- End Modal Interogare 8 -->

</section>