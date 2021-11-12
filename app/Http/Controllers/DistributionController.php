<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nursary;
use App\Distribution;
use Yajra\DataTables\Facades\DataTables;

class DistributionController extends Controller
{
    public function index(Request $request, Nursary $nursary)
    {
        if ($request->ajax()) {
            $model = $nursary->distributions();
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

        return view('pages.distribution.index')->withData($nursary);
    }

    public function create(Nursary $nursary)
    {
        return view('pages.distribution.create')->withData($nursary);
    }

    public function store(Request $request)
    {
        Distribution::create($request->all());
        return redirect()->route('distribution.index', ['nursary'=>$request->nursary_id]);
    }

    public function show(Distribution $distribution)
    {
        return view('pages.distribution.show')->withData($distribution);
    }

    public function edit(Distribution $distribution)
    {
        // dd($distribution);
        return view('pages.distribution.edit')->withData($distribution);
    }

    public function update(Distribution $distribution, Request $request)
    {
        $distribution->update($request->all());
        return redirect()->route('distribution.index', ['nursary'=>$request->nursary_id]);
    }

    public function destroy(Distribution $distribution)
    {
        $distribution->delete();
        return redirect()->route('distribution.index', ['nursary'=>$distribution->nursary_id]);
    }
}
