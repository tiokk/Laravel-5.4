<?php

namespace App\Http\Controllers;

use App\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
 use Illuminate\Support\Facades\Storage;


class User extends Controller
{
    //
    public function index(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = ModelUser::where('email', Session::get('email'))->first();
 			return view('index',compact('data'));
			
        }
    }

    public function login(){
        return view('login');
    }

    public function loginPost(Request $request){

        $email = $request->email;
        $password = $request->password;

        $data = ModelUser::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('name',$data->name);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                return redirect('/');
            }
            else{
                return redirect('login')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('login')->with('alert','Password atau Email, Salah!');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }

    public function register(Request $request){
        return view('register');
    }

    public function registerPost(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            'confirmation' => 'required|same:password',
			'dateOfBirth' => 'required',
			'alamat' => 'required',

        ]);

        $data ;
        $data =  new ModelUser();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
		$data->dob = $request->dateOfBirth;
        $data->add = $request->alamat;

		$WriteArray = $data->toArray();
		$now = gmdate('dmYHis');
		$text = implode(', ', $WriteArray);
		$path = 'public/data/';
		$name = $path .''. $data->name .'-'. $now.'.txt';

 		Storage::disk('local')->put( $name, $text,'public');
		$url = Storage::url($name);
        
        $data->fileurl = $url;

		$data->save();
		
        return redirect('login')->with('alert-success','Kamu berhasil Register, terima kasih telas mengisi form');
    }
}