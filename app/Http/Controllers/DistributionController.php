<?php

namespace App\Http\Controllers;

use App\Distribution;
use App\Nursary;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Distribution::all();
            return DataTables::of($model)
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
        $nursary = Nursary::all();
        return view('pages.distribution.create')->withData($nursary);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Distribution::create($request->all());
        return view('pages.distribution.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distribution  $Distribution
     * @return \Illuminate\Http\Response
     */
    public function show(Distribution $distribution)
    {
        return view('pages.distribution.show')->withData($distribution);
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
            'nursary' => Nursary::all(),
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
