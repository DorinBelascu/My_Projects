<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {
	

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
		$InterogationsArray = [];
		$InterogationsArray[0] = "Sa se gaseasca numele aeronavelor de tipul 'ATR' ordonate crescator .";
		$InterogationsArray[1] = "Sa se gaseasca numele angajatilor si salariul pentru angajatii ce castiga intre 1000 si 2000 .";
		$InterogationsArray[2] = "Sa se gaseasca zbpruri pentru aeronavele de tip 'ATR' sau 'AIRBUS'.";
		$InterogationsArray[3] = "Sa se gaseasca perechi de nume de piloti care pot opera aceleasi avioane.";
		$InterogationsArray[4] = "Sa se gaseasca numele aeronavelor care pot fi folosite pentru zborul de la Cluj la Bucuresti.";
		$InterogationsArray[5] = "Sa se gaseasca numele angajatilor cu salar maxim .";
		$InterogationsArray[6] = "Sa se gaseasca salarul mediu al angajatilor.";
		$InterogationsArray[7] = "Sa se gaseasca pentru cate aeronave este certificat fiecare angajat.";
		$InterogationsArray[8] = "Se verifica daca aeronava introdusa exista cu ajutorul unei proceduri stocate.";								

		$interogationsResultTableTH = [];
		$interogationsResultTableTH[0] = ['Nume Aeronava'];
		$interogationsResultTableTH[1] = ['Nume Angajat', 'Salariu'];
		$interogationsResultTableTH[2] = ['Nume Aeronava', 'Numar Zbor', 'De La', 'La', 'Distanta', 'Sosire'];
		$interogationsResultTableTH[3] = ['Nume1 Angajat', 'Nume2 Angajat'];	
		$interogationsResultTableTH[4] = ['Nume Aeronava'];
		$interogationsResultTableTH[5] = ['Nume Angajat'];	
		$interogationsResultTableTH[6] = ['Media Salariilor Angajatiilor'];
		$interogationsResultTableTH[7] = ['Nume Angajat', 'Numar Aeronave'];		
		$interogationsResultTableTH[8] = ['Exista Sau Nu'];			

		$zboruri = \DB::table('zboruri')->orderBy('nrz')->get();
		$aeronave = \DB::table('aeronave')->orderBy('numeav')->get();
		$angajati = \DB::table('angajati')->orderBy('numean')->get();
		$certificari = \DB::table('certificare')->orderBy('idan')->get();
		$idanArray = [];
		foreach ($angajati as $i => $angajat) {
			$idanArray[$i] = $angajat->idan;
		}
		$idavArray = [];
		foreach ($aeronave as $i => $aeronava) {
			$idavArray[$i] = $aeronava->idav;
		}
		return view('master')->with('zboruri', $zboruri)->with('aeronave', $aeronave)->with('angajati', $angajati)->with('certificari', $certificari)->with('idavArray', $idavArray)->with('idanArray', $idanArray)->with('interogationsArray', $InterogationsArray)->with('interogationsResultTableTH', $interogationsResultTableTH);
	}

}

