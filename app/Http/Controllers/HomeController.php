<?php

namespace App\Http\Controllers;
use App\Portal;
use App\Bulletin;
use Illuminate\Http\Request;

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
      
        $portals = Portal::get();
        $bulletins = Bulletin::get();
        return view('layouts.dashboard',
        array(
            'portals' => $portals,
            'bulletins' => $bulletins,
        )
    );
    }
}
