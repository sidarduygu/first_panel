<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        //Get all users
        $users = User::all();
        return view('panel.user.index', ['users' => $users]);
    }


    public function create()
    {
        return view('panel.user.create');
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'status' => 'required',
            'password' => 'required',
          ]);

          if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->route('user.create')->withErrors($messages)->withInput();
          }

          User::create([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'password' => $request->password,
          ]);

         return redirect()->route('user.index');

        }



    public function show($id)
    {
        //dd($id);
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('panel.user.edit',['user' => $user]);
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'status' => 'required',
            'password' => 'required',
          ]);

          if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->route('user.edit', $user->id)->withErrors($messages)->withInput();
          }

          $user->name = $request->name;
          $user->email = $request->email;
          $user->status = $request->status;
          $user->password = $request->password;
          $user->save();

         return redirect()->route('user.index');

    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index');
    }
}
