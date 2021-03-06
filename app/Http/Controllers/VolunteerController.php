<?php

namespace App\Http\Controllers;

use App\Province;
use App\Volunteer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VolunteerController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Volunteer::with(['province', 'regency']);
            return DataTables::of($model)
                ->addColumn('action', function ($model) {
                    return view('layouts.partials._action', [
                        'model' => $model,
                        'url_show' => route('volunteer.show', $model->id),
                        'url_edit' => route('volunteer.edit', $model->id),
                        'url_destroy' => route('volunteer.destroy', $model->id)
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }

        $volunteerRegency = Volunteer::with(['regency'])->distinct()->get(['regency_id']);
        return view('pages.volunteer.index', [
            'volunteerRegency' => $volunteerRegency
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkGuest();
        $provinces = Province::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('pages.volunteer.create')->with([
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
        $this->checkGuest();
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
            'skill' => ['nullable'],
            'active' => ['required'],
        ]);
        $no = 1;
        $latest = Volunteer::orderBy('id', 'DESC')->first();
        if($latest) {
            $no += $latest->id;
        }
        $request['identity_number'] = $request->province_id.$request->regency_id.$no;
        Volunteer::create($request->all());
        return redirect()->route('volunteer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        return view('pages.volunteer.show')->with([
            'volunteer' => $volunteer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->checkGuest();
        $data = Volunteer::findOrFail($id);
        $provinces = Province::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('pages.volunteer.edit')->with([
            'data' => $data,
            'provinces' => $provinces
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->checkGuest();
        $data = Volunteer::findOrFail($id);
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
            'skill' => ['nullable'],
            'active' => ['required'],
        ]);
        $data->update($request->all());
        return redirect()->route('volunteer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkGuest();
        $data = Volunteer::findOrFail($id);
        $data->delete();
        return redirect()->route('volunteer.index');
    }
}
