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
        $this->validate($request, [
            'name' => ['required'],
            'gender' => ['required'],
            'date_of_birth' => ['required'],
            'status_of_marital' => ['required'],
            'status_of_job' => ['required'],
            'province_id' => ['required'],
            'regency_id' => ['required'],
            'address' => ['required'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'numeric'],
            'media_social' => ['nullable'],
            'affiliate' => ['nullable'],
            'skill' => ['nullable']
        ]);
        $no = 1;
        $latest = Volunteer::orderBy('id', 'DESC')->first();
        if($latest) {
            $no += $latest->id;
        }
        $request['identity_number'] = $request->province_id.$request->regency_id.$no;
        Volunteer::create($request->all());

        return redirect()->back()->withStatus(
            'Selamat! Proses pendaftaran berhasil. Silakan menunggu kabar selanjutnya. Kami akan hubungi Anda.'
        );
    }
}
