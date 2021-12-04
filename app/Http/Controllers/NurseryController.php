<?php

namespace App\Http\Controllers;

use App\Nursery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class NurseryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        {
            if ($request->ajax()) {
                $model = Nursery::query();
                return DataTables::of($model)
                    ->addColumn('add', function ($model) {
                        return view('layouts.partials._add', [
                            'route' => route('stock.index', $model->id)
                        ]);
                    })
                    ->addColumn('action', function ($model) {
                        return view('layouts.partials._action', [
                            'model' => $model,
                            'url_show' => route('nursery.show', $model->id),
                            'url_edit' => route('nursery.edit', $model->id),
                            'url_destroy' => route('nursery.destroy', $model->id)
                        ]);
                    })
                    ->addIndexColumn()
                    ->rawColumns(['action'])->make(true);
            }

            return view('pages.nursery.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->can('create', Nursery::class)) {
            return view('pages.nursery.create');
        }
        return redirect()->back();
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
            'title' => ['required', 'string'],
            'manager' => ['required', 'string'],
        ]);
        $request['user_id'] = auth()->user()->id
        Nursery::create($request->all());
        return redirect()->route('nursery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nursery  $nursery
     * @return \Illuminate\Http\Response
     */
    public function show(Nursery $nursery)
    {
        return view('pages.nursery.show')->withData($nursery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nursery  $nursery
     * @return \Illuminate\Http\Response
     */
    public function edit(Nursery $nursery)
    {
        if (auth()->user()->can('edit', $nursery)) {
            return view('pages.nursery.edit')->withData($nursery);
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nursery  $nursery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nursery $nursery)
    {
        if (auth()->user()->can('update', $nursery)) {
            $this->validate($request, [
                'title' => ['required', 'string'],
                'manager' => ['required', 'string'],
            ]);
            $nursery->update($request->all());
            return redirect()->route('nursery.index');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nursery  $nursery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nursery $nursery)
    {
        if (auth()->user()->can('delete', $nursery)) {
            $nursery->delete();
            return redirect()->route('nursery.index');
        }
        return redirect()->back();
    }
}
