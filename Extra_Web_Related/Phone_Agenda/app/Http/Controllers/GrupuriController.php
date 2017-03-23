<?php namespace App\Http\Controllers;

class GrupuriController extends Controller 
{
	protected $rules = [
		'denumire' => 'required',	
		'simbol'   => 'required',	
	];


	protected $messages = [
		'denumire.required'   => 'Va rugam introduceti ceva',
		'simbol.required'   => 'Va rugam selectati un simbol'
	];

	public function adaugaGrup()
	{
		$data = \Input::all();
		$validator = \Validator::make($data, $this->rules, $this->messages);
		if ($validator->passes()) 
		{	
			\DB::table('grupuri')->insert(
	    		['denumire' => $data['denumire'], 'logo' => $data['simbol']]
			);
			return \Response::json(['success' => true]);
		}
		return \Response::json(['success' => false, 'messages' =>  $validator->errors() ]);
	}

	public function stergeGrup()
	{
		$data = \Input::all();
		\DB::table('persoane')->where('id_grup', '=', $data['id'])->delete();
		\DB::table('grupuri')->where('id', '=', $data['id'])->delete();
		return \Response::json(['success' => true]);
	}

	public function editeazaGrup()
	{
		$data      = \Input::all();
		$validator = \Validator::make($data, $this->rules, $this->messages);
		// $grup      = \DB::table('grupuri')->where('denumire', '=', $data['grup'])->get();

		if ($validator->passes()) 
		{	
			\DB::table('grupuri')->where('id', $data['id'])->update(['denumire' => $data['denumire'], 'logo' => $data['simbol']]
			);
			return \Response::json(['success' => true]);
		}

		return \Response::json(['success' => false, 'messages' =>  $validator->errors() ]);
	}

	public function gasesteGrup()
	{

		// $data = \DB::select("SELECT id, name, mailing, phone FROM agency WHERE (name ILIKE '%" .  . "%') OR (phone ILIKE '%" . $searched . "%') OR (mailing ILIKE '%" . $searched . "%')");


		$searched = \Input::get('q');
		$data = \DB::select("SELECT id, logo, denumire FROM grupuri WHERE (denumire LIKE '%" . $searched  . "%')");
  		return \Response::json(['searched' => $searched, 'items' => $data]);
	}
}