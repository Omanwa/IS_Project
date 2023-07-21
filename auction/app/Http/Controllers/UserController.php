<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function login(){
        return view('user.login');
    }
    public function register(Request $request){
        return view('user.register');
      
    }
    public function authRegister(Request $request){
        $request->validate([
            'username' => 'required|alpha',
            'role' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password'=>'min:9|required_with:cpassword|same:cpassword',
            'cpassword'=>'min:9',
        ]);
        
      
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
       
        $user->save();

        return redirect('login');
    }
 
    public function authLogin(Request $req){
        $email = $req->input('email');
        $password = Hash::make($req->input('password'));
        $user = User::where('email',$email)->first();

        if($user){
        //user not found
        
        //check password
        if(Hash::check($req->password,$user->password)){
           
                    $rolename= $user->role;
                    if($rolename == "admin"){
                        return redirect('admin');
                    }elseif($rolename == "buyer"){
                        return redirect('buyer');
                    }elseif($rolename == "seller"){
                        return redirect('items');
                    }
            //return redirect('/')->with(['name'=>" "]);
        
        }else{
        //invalid password
        return redirect('login')->with(['error'=> "Invalid email or Password!!"]);
        }
        }else{
        return redirect('login')->with(['error'=> "Invalid email or Password!!"]);
         
        
        }

    }

    public function all(){

        $allUsers = User::paginate(7);

         return view('user.all',['users'=>$allUsers]);
    }
    public function add(){
        return view('user.add');
    }
    public function save(Request $request){

        $request->validate([
            'username' => 'min:2',
            'role'=>'min:2',
            'email'=>'email',
            'password'=>'min:9|required_with:cpassword|same:cpassword',
            'cpassword'=>'min:9',
        ]);

        $user_name = ($request->get('username'));
        $user_role = ($request->get('role'));
        $user_email = ($request->get('email'));
        $user_password = Hash::make ($request->get('password'));
        $user_cpassword = ($request->get('cpassword'));

        $user = new User();
        $user->username = $user_name;
        $user->role = $user_role;
        $user->email = $user_email;
        $user->password = $user_password;

        $user->save();

          return redirect('users')->with('status',"$user_name user saved");
    }
    public function edit($user_id){
        $user = User::find($user_id);

        if($user)
            return view('user.edit',['user'=>$user]);
        else
            return redirect('users');
    }
    public function saveChanges($user_id, Request $request){

        $request->validate([
            'user_name' => 'required|min:2|max:10|alpha'
        ]);

        $user_name = ($request->get('user_name'));

        $user = User::find($user_id);
 
        if($user){
            $user->username = $user_name;
            $user->save();

            return redirect('users')->with('status',"User $user_name updated.");
        }else{
            return redirect('users');
        }
    }
    public function delete($user_id){

       $user =User::find($user_id);
       if($user){
            $user->delete();
            return redirect('users')->with('status',"User deleted.");
    }else{
        return redirect('users')->with('status',"User does not exist");
    }
    }
}