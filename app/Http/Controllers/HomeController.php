<?php

namespace App\Http\Controllers;
use App\Portal;
use App\Bulletin;
use Illuminate\Http\Request;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
        // Alert::success('Success Title', 'Welcome '.auth()->user()->name);
        $user = User::with('employee')->where('id', auth()->user()->id)->first();
        $portals = Portal::where('status', 1)->get();
        $bulletins = Bulletin::get();
        return view('layouts.dashboard',
        array(
            'portals' => $portals,
            'bulletins' => $bulletins,
            'user' => $user,
        )
    );
    }
}
