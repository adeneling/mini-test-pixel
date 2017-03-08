<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Tweet;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tweets'] = Tweet::orderBy('created_at','desc')->get();
        return view('home', $data);
    }
    public function tweet(Request $request){
        if ($request->input('tweet') == '') {
            flash('Woooppppssss!, Please input your tweet!', 'danger');
            return redirect()->back();
        }else{
            $tweet = new Tweet();
            $tweet->user_id = Auth::user()->id;
            $tweet->tweet = $request->input('tweet');
            $tweet->save();
            flash()->overlay(''. $tweet->tweet , 'Huuurayyyyy!');            
            return redirect()->back();
        }
        
    }
}
