<?php namespace App\Http\Controllers;

class ZboruriController extends Controller 
{
	protected $rules = [
		'nrz'    => 'unique:zboruri',
	];

	protected $messages = [
		'nrz.unique'   => 'Ati introdus o cheie primara deja existenta.',
	];
	public function addZborToDatabase()
	{
		$data = \Input::all();

		$validator = \Validator::make($data, $this->rules, $this->messages);
		if ($validator->passes()) 
		{	
			\DB::table('zboruri')->insert(
	    		['nrz' => $data['nrz'], 'de_la' => $data['de_la'], 'la' => $data['la'], 'distanta' => $data['distanta'], 'plecare' => $data['plecare'], 'sosire' => $data['sosire']]
			);
			return \Redirect::route('/')->with('result-success', 'Zborul a fost adaugat');
		}
		return \Redirect::route('/')->witherrors($validator)->with('result-fail', 'Ati introdus o cheie primara deja existenta');
	}
}