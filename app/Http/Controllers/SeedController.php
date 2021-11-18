<?php

namespace App\Http\Controllers;

use App\Seed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class SeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Seed::all();
            return DataTables::of($model)
                ->addColumn('action', function ($model) {
                    return view('layouts.partials._action', [
                        'model' => $model,
                        'url_show' => ('#'),
                        'url_edit' => route('seed.edit', $model->id),
                        'url_destroy' => route('seed.destroy', $model->id)
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }

        return view('pages.seed.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.seed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Seed::create($request->all());
        return view('pages.seed.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seed  $seed
     * @return \Illuminate\Http\Response
     */
    public function show(Seed $seed)
    {
        return view('pages.seed.show')->withData($seed);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seed  $seed
     * @return \Illuminate\Http\Response
     */
    public function edit(Seed $seed)
    {
        return view('pages.seed.edit')->withData($seed);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seed  $seed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seed $seed)
    {
        $seed->update($request->all());
        return view('pages.seed.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seed  $seed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seed $seed)
    {
        $seed->delete();
        return view('pages.seed.index');
    }
}
