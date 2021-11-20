<?php

namespace App\Http\Controllers;

use App\Distribution;
use App\Nursery;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DistributionController extends Controller
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
            $model = Distribution::query();
            return DataTables::of($model)
                ->addColumn('add', function ($model) {
                    return view('layouts.partials._add', [
                        'route' => route('dist.seed.index', $model->id)
                    ]);
                })
                ->addColumn('action', function ($model) {
                    return view('layouts.partials._action', [
                        'model' => $model,
                        'url_show' => route('distribution.show', $model->id),
                        'url_edit' => route('distribution.edit', $model->id),
                        'url_destroy' => route('distribution.destroy', $model->id)
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }

        return view('pages.distribution.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nursery = Nursery::all();
        return view('pages.distribution.create')->withData($nursery);
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
            'nursery_id' => ['required', 'numeric'],
            'title' => ['required', 'string'],
            'location' => ['required', 'string'],
            'longitude' => ['required', 'string'],
            'latitude' => ['required', 'string'],
        ]);
        Distribution::create($request->all());
        return redirect()->route('distribution.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distribution  $Distribution
     * @return \Illuminate\Http\Response
     */
    public function show(Distribution $distribution)
    {
        $data = [
            'distribution' => $distribution,
            'seed' => $distribution->load('distribution_seeds')
        ];
        return view('pages.distribution.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distribution  $Distribution
     * @return \Illuminate\Http\Response
     */
    public function edit(Distribution $distribution)
    {
        $data = [
            'nursary' => Nursery::all(),
            'distribution' => $distribution

        ];
        return view('pages.distribution.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distribution  $Distribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distribution $distribution)
    {
        $this->validate($request, [
            'nursery_id' => ['required', 'numeric'],
            'title' => ['required', 'string'],
            'location' => ['required', 'string'],
            'longitude' => ['required', 'string'],
            'latitude' => ['required', 'string'],
        ]);
        $distribution->update($request->all());
        return view('pages.distribution.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distribution  $Distribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distribution $distribution)
    {
        $distribution->delete();
        return view('pages.distribution.index');
    }
}
