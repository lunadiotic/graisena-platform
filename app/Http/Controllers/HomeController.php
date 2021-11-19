<?php

namespace App\Http\Controllers;

use App\Distribution;
use App\Nursary;
use App\Subprogram;
use App\Volunteer;
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
        $data = [
            'subprogram' => Subprogram::count(),
            'volunteer' => Volunteer::count(),
            'distribution' => Distribution::count(),
            'nursary' => Nursary::count()
        ];
        return view('home')->with($data);
    }
}
