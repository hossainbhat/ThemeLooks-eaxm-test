<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserController extends Controller
{
    public function index(){
        $users = User::get();
        return view("users.list",compact('users'));
    }

    public function create(){
        return view("users.create");
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users',
            'birth_date' => 'required',
            'city' => 'required',
            'country' => 'required',
            'status' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create New Admin
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->birth_date = $request->birth_date;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->status = $request->status;
        $user->password = bcrypt($request->password);
        $user->save();

        session()->flash('success', 'Registation has been Successfull !');
        return redirect()->route('users.index');
    }

    public function edit($id){
        
        $user = User::find($id);
        // dd($user);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        
           // Create New Admin
           $user = User::find($id);

           // Validation Data
           $request->validate([
                'name' => 'required|max:50',
                'birth_date' => 'required',
                'city' => 'required',
                'country' => 'required',
                'status' => 'required',
                'email' => 'required|max:100|email|unique:users,email,' . $id,
                'password' => 'nullable|min:6|confirmed',
           ]);
   
   
            $user->name = $request->name;
            $user->email = $request->email;
            $user->name = $request->name;
            $user->birth_date = $request->birth_date;
            $user->city = $request->city;
            $user->country = $request->country;
            $user->status = $request->status;
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
   
           session()->flash('success', 'User has been updated !!');
               
           return redirect('admin/users');
    }

    public function destroy($id){
         
        User::where('id',$id)->delete();
        return redirect()->back()->with("success_message","Banner has been deleted Successfully!");
    }
}
