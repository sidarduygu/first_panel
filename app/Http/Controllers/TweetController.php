<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {   

        //sadece 10 tane gostericez 
        $tweets = Tweet::orderBy('created_at','desc')->paginate(10);
        return view('welcome', ['tweets' => $tweets]);
    }

    public function create(Request $request)
    {
        Tweet::create([
            'name' => $request->name,
            'username' => $request->username,
            'text' => $request->text,
            'image' => $request->image,
        ]);

        return redirect()->route('tweet.index');
    }
    
}
