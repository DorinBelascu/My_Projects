<?php namespace App\Http\Controllers;

class CertificariController extends Controller 
{
	protected $rules = [
		'idan' => 'unique:certificare,idan,NULL,id,idav,',
	];

	protected $messages = [
		'idan.unique'   => 'Ati introdus o cheie primara deja existenta.',
	];
	public function addCertificareToDatabase()
	{
		$data = \Input::all();
		$aeronave = \DB::table('aeronave')->orderBy('numeav')->get();
		$angajati = \DB::table('angajati')->orderBy('numean')->get();
		foreach ($angajati as $i => $angajat) {
			$idanArray[$i] = $angajat->idan;
		}
		$idavArray = [];
		foreach ($aeronave as $i => $aeronava) {
			$idavArray[$i] = $aeronava->idav;
		}
		$validator = \Validator::make($data, $this->rules, $this->messages);
		if ($validator->passes()) 
		{	
			\DB::table('certificare')->insert(
	    		['idan' => $idanArray[$data['idan']], 'idav' => $idavArray[$data['idav']]]
			);
			return \Redirect::route('/');
		}
		return \Redirect::route('/')->witherrors($validator)->with('result-fail', 'Ati introdus o cheie primara deja existenta');
	}
}