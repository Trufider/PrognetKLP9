<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Mail\verifyuser;
use \Mail;
use Illuminate\Support\Facades\DB;
use Session;
use \stdClass;
use App\product;
use App\product_image;

class userController extends Controller
{

    public function dashboard(){
        $item =product::all();
        return view('user/dashboard',compact('item'));
    }

    public function userlogin(){
        return view('user/loginuser');
    }

    public function userregister(){
        return view('user/registeruser');
    }

    public function registersubmit(Request $request){
        
        $validator = Validator::make(request()->all(),[
            'name' => 'required|max:30|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'status' => 'required|min:3|max:20|',
            'password'=>'required_with:password_confirmation|same:password_confirmation|min:8',
            'file' => 'required|max:700',
            'password_confirmation' => 'required|min:8'
        ]);

         if ($validator->fails()){
            
            return redirect('user/register')->withErrors($validator->errors());

        }else{

        $file = $request->file('file');
        $tujuan = 'fotouser\\';
        $disimpan =$tujuan.$file->getClientOriginalName();
        $file->move($tujuan,$file->getClientOriginalName());

        $new = new User;
        $new->name = $request->name;
        $new->email = $request->email;
        $new->password = Hash::make($request->password);
        $new->status = $request->status;
        $new->profile_image = $disimpan;
        session::put('user',$new->name);
        session::put('email',$new->email);
        $email =$new->email;
        $name =$new->name;
        $data =array("email" => $email,"name" => $name);
        $new->save();
        
        Mail::to($request->email)->send(new verifyuser($data));

        return redirect('user/verify');
        }

    }

    public function sendagain(){
        $email = Session::get('email');
        $name = Session::get('user');
        dd($email);
        $data =array("email" => $email,"name" =>$name);

        Mail::to($email)->send(new verifyuser($data));
        return redirect()->back();
    }

    public function verifyemailuser($email){
        $veri = DB::statement('UPDATE users SET users.`email_verified_at`=NOW() WHERE users.email = ?',array($email));
        
        return redirect('user/login');
    }

    public function loginsubmit(Request $request){
        $data = $request->only('name','password');
        if(Auth::guard('user')->attempt($data)){
            return redirect('user/dashboard');
        }else{
            return redirect('user/login')->with(['fail'=>'0']);
        }
    }

    public function logout(){
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        }
            return redirect('user/login');
    }
}
