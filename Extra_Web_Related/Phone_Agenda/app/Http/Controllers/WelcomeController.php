<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$persoane = \DB::table('persoane')
			->leftjoin('grupuri', 'id_grup', '=', 'grupuri.id')
			->select('persoane.id', 'grupuri.denumire', 'persoane.nume', 'persoane.prenume', 'persoane.id_grup', 'persoane.email', 'persoane.telefon', 'persoane.poza', 'grupuri.logo')
			->get();
		$grupuri = \DB::table('grupuri')->orderBy('id')->get();
		$grupuri_select = [];
		foreach ($grupuri as $i => $grup) 
		{
			$grupuri_select[$i] = $grup->denumire;
		}
		return view('master')->with('persoane', $persoane)->with('grupuri', $grupuri)->with('grupuri_select', $grupuri_select);
	}



}
