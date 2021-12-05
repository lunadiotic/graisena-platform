<?php

namespace App\Http\Controllers;

use App\Distribution;
use App\Nursery;
use App\Subprogram;
use App\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
            'nursery' => Nursery::count(),
            'done' => Subprogram::where('status', 'done')->get(),
            'progress' => Subprogram::where('status', 'progress')->get(),
            'soon' => Subprogram::where('status', 'soon')->get()
        ];
        return view('home')->with($data);
    }
}
