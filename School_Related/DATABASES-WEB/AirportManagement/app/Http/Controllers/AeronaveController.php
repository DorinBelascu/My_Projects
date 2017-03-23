<?php namespace App\Http\Controllers;

class AeronaveController extends Controller 
{
	protected $rules = [
		'idav'    => 'unique:aeronave',
	];

	protected $messages = [
		'idav.unique'   => 'Ati introdus o cheie primara deja existenta.',
	];
	public function addAeronavaToDatabase()
	{
		$data = \Input::all();
		$validator = \Validator::make($data, $this->rules, $this->messages);
		if ($validator->passes()) 
		{	
			\DB::table('aeronave')->insert(
	    		['idav' => $data['idav'], 'numeav' => $data['numeav'], 'gama_croaziera' => $data['gama_croaziera']]
			);
			return \Redirect::route('/');
		}
		return \Redirect::route('/')->witherrors($validator)->with('result-fail', 'Ati introdus o cheie primara deja existenta');
	}
}