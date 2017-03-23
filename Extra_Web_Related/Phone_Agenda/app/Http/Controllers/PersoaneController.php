<?php namespace App\Http\Controllers;

class PersoaneController extends Controller 
{
	protected $rules = [
		'nume'    => 'required',
		'prenume' => 'required',
		'email'   => 'required',
		'telefon' => 'required',
		'grup'    => 'required',	
	];


	protected $messages = [
		'email.required'   => 'Va rugam introduceti ceva',
		'telefon.required' => 'Va rugam introduceti ceva',
		'telefon.integer'  => 'Va rog introduceti un numar intreg',
		'prenume.required' => 'Va rugam introduceti ceva',
		'nume.required'    => 'Va rugam introduceti ceva',
		'grup.required'    => 'Va rugam introduceti ceva',
	];

	public function addPersoanaToDatabase()
	{
		$data = \Input::all();
		$grup      = \DB::table('grupuri')->where('denumire', '=', $data['grup'])->get();

		$validator = \Validator::make($data, $this->rules, $this->messages);
		if ($validator->passes()) 
		{	
			\DB::table('persoane')->insert(
	    		['nume' => $data['nume'], 'prenume' => $data['prenume'], 'telefon' => $data['telefon'], 'email' => $data['email'], 'id_grup' => $grup[0]->id, 'poza' => 'default.jpg']
			);
			return \Response::json(['success' => true]);
		}
		return \Response::json(['success' => false, 'messages' =>  $validator->errors() ]);
	}

	public function stergePersoana()
	{
		$data = \Input::all();
		\DB::table('persoane')->where('id', '=', $data['id'])->delete();
		return \Response::json(['success' => true]);
	}

	public function editeazaPersoana()
	{
		$data      = \Input::all();
		$validator = \Validator::make($data, $this->rules, $this->messages);
		$grup      = \DB::table('grupuri')->where('denumire', '=', $data['grup'])->get();

		if ($validator->passes()) 
		{	
			$persoana = \DB::table('persoane')
				->where('id', $data['id'])
				->update(['nume' => $data['nume'], 'prenume' => $data['prenume'], 'telefon' => $data['telefon'], 'email' => $data['email'], 'id_grup' => $grup[0]->id]
			);
			return \Response::json(['success' => true]);
		}

		return \Response::json(['success' => false, 'messages' =>  $validator->errors() ]);
	}

	public function adaugaPoza($id)
	{
		if( ! ($persoana = \DB::table('persoane')->where('id', $id) ))
		{
			return Redirect::route('/');
		}

		$input = ['file' => $uploadedFile = \Input::file('photo-persoana') ];
    	$rules = ['file' => 'image|max:3000'];
    	$messages = ['file.image' => 'Fisierul trebuie sa fie o imagine valida', 'file.max' => 'Fisierul nu trebuie sa depaseasca 3MB'];
		$validator = \Validator::make($input, $rules, $messages);
		if ($validator->fails())
		{
			return Redirect::route('/', ['id' => $id])->withErrors($validator);
		}

		$destinationPath = $path =  app_path() . '/../public/img/persoane/';

		$filename = ('photo_' . $id . '-square.' . $uploadedFile->getClientOriginalExtension());
		$persoana->update(['poza' => $filename]);

		$uploadedFile->move($destinationPath, $filename  );


		
		$baseName = 'photo_' . $id;
		$photoFileName = str_replace('\\', '/', $destinationPath . $filename);
		$extention ='.' . $uploadedFile->getClientOriginalExtension();
		$sizes = \Config::get('images.sizes');

		$img = \Image::make($photoFileName);
		$min = min( $img->width(), $img->height() );
		$img->crop($min, $min)->save( $path . '/' . $baseName . '-square.' . $uploadedFile->getClientOriginalExtension());
		// echo '<pre>';
		// // var_dump();

	    // foreach ($sizes as $key => $value) 
	    // {
	    // 	$img = \Image::make($path . '/' . $baseName . '-square.' . $uploadedFile->getClientOriginalExtension());
	    // 	$img->resize($value, $value , 
	    // 		function ($constraint)
	    // 		{
	    //     		$constraint->aspectRatio();
	    //     		$constraint->upsize();
	    // 		}
	    // 	)
	    // 	// ->crop($value, $value)
	    // 	->save($path . '/' . $baseName . $key . $extention);
	    // }
	    return \Redirect::route('/');
	}
}