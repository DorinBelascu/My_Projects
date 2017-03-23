<?php namespace App\Http\Controllers;

class InterogariController extends Controller 
{
	public function doInterogation0ToDatabase()
	{
		$data = \Input::all();
		$querry = "SELECT numeav from aeronave where substr(numeav,1,3)= '" . $data['interogare_0_0'] . "' order by numeav ASC;";
		$resultInitial = \DB::select($querry);	
		$result = [];
		foreach ($resultInitial as $key => $value) {
			$result[$key] = [$value->numeav];
		}
		return \Redirect::route('/')->with('result', $result)->with('interogationNumber', 0);
	}
	public function doInterogation1ToDatabase()
	{
		$data = \Input::all();
		$querry = "Select numean,salariu from ANGAJATI where salariu> " . $data['interogare_1_1']. " and salariu<" .  $data['interogare_1_0']. ";";
		$resultInitial = \DB::select($querry);	
		$result = [];
		foreach ($resultInitial as $key => $value) {
			$result[$key] = [$value->numean, $value->salariu];
		}
		return \Redirect::route('/')->with('result', $result)->with('interogationNumber', 1);
	}

	public function doInterogation2ToDatabase()
	{
		$data = \Input::all();
		$querry = "select a.numeav,z.nrz,z.de_la,z.la,z.distanta,z.sosire from Zboruri z JOIN aeronave a ON(z.distanta < a.GAMA_CROAZIERA) where substr(a.numeav,1,3)= '".$data['interogare_2_0']."' or substr(a.numeav,1,6)= '".$data['interogare_2_1']."'";
		$resultInitial = \DB::select($querry);	
		$result = [];
		foreach ($resultInitial as $key => $value) {
			$result[$key] = [$value->numeav, $value->nrz, $value->de_la, $value->la, $value->distanta, $value->sosire];
		}
		return \Redirect::route('/')->with('result', $result)->with('interogationNumber', 2);							
	}

	public function doInterogation3ToDatabase()
	{

		$querry = "SELECT i.numean, j.numean
					FROM Angajati i 
					JOIN CERTIFICARE c On(c.idan=i.IDAN )
					Join Certificare d On(c.idan !=d.idan)
					Join Angajati j on(d.idan=j.idan)
					where c.idav=d.idav and i.numean<j.numean;";
		$resultInitial1 = \DB::select($querry);	
		$querry = "SELECT j.numean, i.numean 
					FROM Angajati i 
					JOIN CERTIFICARE c On(c.idan=i.IDAN )
					Join Certificare d On(c.idan !=d.idan)
					Join Angajati j on(d.idan=j.idan)
					where c.idav=d.idav and i.numean<j.numean;";
		$resultInitial2 = \DB::select($querry);
		$result = [];
		foreach ($resultInitial2 as $key => $value) {
			$result[$key] = [$value->numean, $resultInitial1[$key]->numean];
		}
		return \Redirect::route('/')->with('result', $result)->with('interogationNumber', 3);	
		
	}

	public function doInterogation4ToDatabase()
	{
		$data = \Input::all();
		$querry = "Select numeav from Aeronave 
					where exists(select distanta,de_la,la from Zboruri where distanta<gama_croaziera and de_la='".$data['interogare_4_0']."' and la='".$data['interogare_4_1']."');";
		$resultInitial = \DB::select($querry);	
		$result = [];
		foreach ($resultInitial as $key => $value) {
			$result[$key] = [$value->numeav];
		}
		return \Redirect::route('/')->with('result', $result)->with('interogationNumber', 4);				
	}

	public function doInterogation5ToDatabase()
	{
		$interogare_5_0Array = ['Min', 'Max'];
		$data = \Input::all();
		$querry = "Select numean from Angajati where SALARIU=any(select ".$interogare_5_0Array[$data['interogare_5_0']]."(salariu)from angajati);";

		$resultInitial = \DB::select($querry);	
		$result = [];
		foreach ($resultInitial as $key => $value) {
			$result[$key] = [$value->numean];
		}
		return \Redirect::route('/')->with('result', $result)->with('interogationNumber', 5);			
	}

	public function doInterogation6ToDatabase()
	{
		$querry = "select avg(salariu) as Mediu from ANGAJATI;";
		$resultInitial = \DB::select($querry);	
		$result = [];
		foreach ($resultInitial as $key => $value) {
			$result[$key] = [$value->Mediu];
		}
		return \Redirect::route('/')->with('result', $result)->with('interogationNumber', 6);	
	}	

	public function doInterogation7ToDatabase()
	{
		$querry = "SELECT numean as nume_angajat, COUNT(distinct Aeronave.idav) as numar_aeronave
					FROM Certificare
					JOIN Angajati ON Angajati.idan=Certificare.idan
					JOIN Aeronave ON Aeronave.idav=Certificare.idav
					GROUP BY numean;";
		$resultInitial = \DB::select($querry);	
		$result = [];
		foreach ($resultInitial as $key => $value) {
			$result[$key] = [$value->nume_angajat, $value->numar_aeronave];
		}
		return \Redirect::route('/')->with('result', $result)->with('interogationNumber', 7);		
	}

	public function doInterogation8ToDatabase()
	{
		$data = \Input::all();
		$querry = "call checkAeronava('". $data['interogare_8_0'] ."');";
		$resultInitial = \DB::select($querry);	
		if (isset($resultInitial[0])) {
			$result[0] = ['Exista'];
		}
		else
		{
			$result[0] = ['Nu Exista'];
		}
		return \Redirect::route('/')->with('result', $result)->with('interogationNumber', 8);		
	}	
}