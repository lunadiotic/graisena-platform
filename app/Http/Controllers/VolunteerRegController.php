<?php

namespace App\Http\Controllers;

use App\Province;
use App\Volunteer;
use Illuminate\Http\Request;

class VolunteerRegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('pages.regvolunteer.index')->with([
            'provinces' => $provinces
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Volunteer::create($request->all());

        return redirect()->back()->withStatus(
            'Selamat! Proses pendaftaran berhasil. Silakan menunggu kabar selanjutnya. Kami akan hubungi Anda.'
        );
    }
}
