<?php namespace App\Http\Controllers;

class AngajatiController extends Controller 
{
	protected $rules = [
		'idan'    => 'unique:angajati',
	];

	protected $messages = [
		'idan.unique'   => 'Ati introdus o cheie primara deja existenta.',
	];
	public function addAngajatToDatabase()
	{
		$data = \Input::all();

		$validator = \Validator::make($data, $this->rules, $this->messages);
		if ($validator->passes()) 
		{	
			\DB::table('angajati')->insert(
	    		['idan' => $data['idan'], 'numean' => $data['numean'], 'salariu' => $data['salariu'], 'data_nasterii' => $data['data_nasterii']]
			);
			return \Redirect::route('/');
		}
		return \Redirect::route('/')->witherrors($validator)->with('result-fail', 'Ati introdus o cheie primara deja existenta');
	}
}