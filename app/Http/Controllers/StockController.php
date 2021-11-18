<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nursary;
use App\Seed;
use App\Stock;
use Yajra\DataTables\Facades\DataTables;

class StockController extends Controller
{
    public function index(Request $request, Nursary $nursary)
    {
        // dd($nursary);
        if ($request->ajax()) {
            $model = $nursary->stocks();
            return DataTables::of($model)
                ->addColumn('seed', function($model){
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
        Stock::create($request->all());
        return redirect()->route('stock.index', ['nursary'=>$request->nursary_id]);
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
        $stock->update($request->all());
        return redirect()->route('stock.index', ['nursary'=>$request->nursary_id]);
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stock.index', ['nursary'=>$stock->nursary_id]);
    }
}
