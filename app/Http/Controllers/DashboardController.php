<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(Request $request)
    {   
        return view('panel.dashboard');
    }

    public function users(Request $request)
    {   
        $users = User::all();
        return view('panel.users',[
            'users'=> $users 
        ]);
    }

    public function userAdd(Request $request)
    {   
        return view('panel.user-add');
    }

    public function userAddFunction(Request $request)
    {   
        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]
        );
        return redirect()->route('page.users');
    }

    public function userSaveFunction(Request $request)
    {   
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('page.users');
    }

    public function userEdit(Request $request, $id)
    {   
        $user = User::find($id);
        return view('panel.user-edit',[
            'user'=> $user 
        ]);
    }
}
