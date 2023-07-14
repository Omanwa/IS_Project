<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function all(){

        $allUsers = User::paginate(7);

         return view('user.all',['users'=>$allUsers]);
    }
    public function add(){
        return view('user.add');
    }
    public function save(Request $request){

        $request->validate([
            'user_name' => 'required|min:2|max:10|alpha'
        ]);

        $user_name = ($request->get('user_name'));

        $user = new User();
        $user->username = $user_name;
        $user->save();

          return redirect('users')->with('status',"$user_name role saved");
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