<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nursary;
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

    public function index(Request $request, Nursary $nursary)
    {
        if ($request->ajax()) {
            $model = $nursary->stocks();
            return DataTables::of($model)
                ->addColumn('seed', function ($model) {
                    return $model->seed->title;
                })
                ->addColumn('action', function ($model) {
                    return view('layouts.partials._action', [
                        'model' => $model,
                        'url_show' => route('stock.show', $model->id),
                        'url_edit' => route('stock.edit', $model->id),
                        'url_destroy' => route('stock.destroy', $model->id)
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }

        return view('pages.stock.index')->withData($nursary);
    }

    public function create(Nursary $nursary)
    {
        $data = [
            'nursary' => $nursary,
            'seed' => Seed::all(),
        ];
        return view('pages.stock.create')->with($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nursary_id' => ['required', 'numeric'],
            'seed_id' => ['required', 'numeric'],
            'date_check' => ['required', 'date'],
            'seed_good' => ['required', 'numeric'],
            'seed_broken' => ['required', 'numeric'],
            'seed_death' => ['required', 'numeric'],
            'seed_out' => ['required', 'numeric'],
            'total_seed' => ['required', 'numeric'],
        ]);
        Stock::create($request->all());
        return redirect()->route('stock.index', ['nursary' => $request->nursary_id]);
    }

    public function show(Stock $stock)
    {
        return view('pages.stock.show')->withData($stock);
    }

    public function edit(Stock $stock)
    {
        $data = [
            'stock' => $stock,
            'seed' => Seed::all(),
        ];
        return view('pages.stock.edit')->with($data);
    }

    public function update(Stock $stock, Request $request)
    {
        $this->validate($request, [
            'nursary_id' => ['required', 'numeric'],
            'seed_id' => ['required', 'numeric'],
            'date_check' => ['required', 'date'],
            'seed_good' => ['required', 'numeric'],
            'seed_broken' => ['required', 'numeric'],
            'seed_death' => ['required', 'numeric'],
            'seed_out' => ['required', 'numeric'],
            'total_seed' => ['required', 'numeric'],
        ]);
        $stock->update($request->all());
        return redirect()->route('stock.index', ['nursary' => $request->nursary_id]);
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stock.index', ['nursary' => $stock->nursary_id]);
    }
}
