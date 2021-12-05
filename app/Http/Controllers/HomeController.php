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
    //     $start_date = Carbon::createFromFormat('d-m-Y', '3-10-2020');
    // $end_date = Carbon::createFromFormat('d-m-Y', '15-11-2020');

    // $different_days = $start_date->diffInDays($end_date);

    // return $different_days;
        $data = [
            'subprogram' => Subprogram::count(),
            'volunteer' => Volunteer::count(),
            'distribution' => Distribution::count(),
            'nursery' => Nursery::count(),
            'done' => Subprogram::where('status', 'done')->get(),
            'progress' => Subprogram::where('status', 'progress')->get(),
            'soon' => Subprogram::where('status', 'soon')->get()
        ];
        // dd($progress);
        return view('home')->with($data);
    }
}
