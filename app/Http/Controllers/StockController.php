<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nursery;
use App\Seed;
use App\Stock;
use Yajra\DataTables\Facades\DataTables;

class StockController extends Controller
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

    public function index(Request $request, $id)
    {
        if ($request->ajax()) {
            $model = Stock::where('nursery_id', $id)
                ->orderBy('date_check', 'DESC')->with(['nursery']);
            return DataTables::of($model)
                ->addColumn('seed', function ($model) {
                    return $model->seed->title;
                })
                ->addColumn('action', function ($model) {
                    return view('layouts.partials._action', [
                        'model' => $model,
                        'url_show' => route('stock.show', [$model->nursery->id, $model->id]),
                        'url_edit' => route('stock.edit', [$model->nursery->id, $model->id]),
                        'url_destroy' => route('stock.destroy', [$model->nursery->id, $model->id])
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }
        $nursery = Nursery::findOrFail($id);
        return view('pages.stock.index')->with([
            'nursery' => $nursery
        ]);
    }

    public function create($id)
    {
        $nursery = Nursery::findOrFail($id);
        $seed = Seed::all();
        $data = [
            'nursery' => $nursery,
            'seed' => $seed,
        ];
        return view('pages.stock.create')->with($data);
    }

    public function store($id, Request $request)
    {
        $nursery = Nursery::findOrFail($id);
        $this->validate($request, [
            'seed_id' => ['required', 'numeric'],
            'date_check' => ['required', 'date'],
            'seed_good' => ['required', 'numeric'],
            'seed_broken' => ['required', 'numeric'],
            'seed_death' => ['required', 'numeric'],
            'seed_out' => ['required', 'numeric'],
            'total_seed' => ['required', 'numeric'],
        ]);
        $request['user_id'] = auth()->user()->id;
        $nursery->stocks()->create($request->all());
        return redirect()->route('stock.index', $nursery->id);
    }

    public function show($id, $stock)
    {
        $nursery = Nursery::findOrFail($id);
        $data = $nursery->stocks()->where('id', $stock)->first();
        return view('pages.stock.show')->withData($data);
    }

    public function edit($id, $stock)
    {
        $nursery = Nursery::findOrFail($id);
        $stockSeed = $nursery->stocks()->find($stock);
        $seed = Seed::all();
        if (auth()->user()->can('edit', $stockSeed)) {
            $data = [
                'nursery' => $nursery,
                'stock' => $stockSeed,
                'seed' => $seed,
            ];
            return view('pages.stock.edit')->with($data);
        }
        return redirect()->back();
    }

    public function update(Request $request, $id, $stock)
    {
        $nursery = Nursery::findOrFail($id);
        $this->validate($request, [
            'seed_id' => ['required', 'numeric'],
            'date_check' => ['required', 'date'],
            'seed_good' => ['required', 'numeric'],
            'seed_broken' => ['required', 'numeric'],
            'seed_death' => ['required', 'numeric'],
            'seed_out' => ['required', 'numeric'],
            'total_seed' => ['required', 'numeric'],
        ]);
        $stockSeed = $nursery->stocks()->find($stock);
        if (auth()->user()->can('update', $stockSeed)) {
            $stockSeed->update($request->except(['_method', '_token']));
            return redirect()->route('stock.index', $nursery->id);
        }
        return redirect()->back();
    }

    public function destroy($id, $stock)
    {
        $nursery = Nursery::findOrFail($id);
        $stockSeed = $nursery->stocks()->find($stock);
        if (auth()->user()->can('delete', $stockSeed)) {
            $stockSeed->delete();
            return redirect()->route('stock.index', $nursery->id);
        }
        return redirect()->back();
    }
}
