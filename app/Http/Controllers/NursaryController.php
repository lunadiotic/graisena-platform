<?php

namespace App\Http\Controllers;

use App\Nursary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class NursaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Nursary::query();
            return DataTables::of($model)
                ->addColumn('action', function ($model) {
                    return view('layouts.partials._action_nursary', [
                        'model' => $model,
                        'url_add_stock' => route('stock.index', $model->id),
                        'url_show' => route('nursary.show', $model->id),
                        'url_edit' => route('nursary.edit', $model->id),
                        'url_destroy' => route('nursary.destroy', $model->id)
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }

        return view('pages.nursary.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.nursary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        nursary::create($request->all());
        return view('pages.nursary.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\nursary  $nursary
     * @return \Illuminate\Http\Response
     */
    public function show(Nursary $nursary)
    {
        return view('pages.nursary.show')->withData($nursary);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nursary  $nursary
     * @return \Illuminate\Http\Response
     */
    public function edit(Nursary $nursary)
    {
        return view('pages.nursary.edit')->withData($nursary);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\nursary  $nursary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nursary $nursary)
    {
        $nursary->update($request->all());
        return view('pages.nursary.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nursary  $nursary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nursary $nursary)
    {
        $nursary->delete();
        return view('pages.nursary.index');
    }
}
