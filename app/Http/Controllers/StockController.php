<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nursary;
use App\Stock;
use Yajra\DataTables\Facades\DataTables;

class StockController extends Controller
{
    public function index(Request $request, Nursary $nursary)
    {
        if ($request->ajax()) {
            $model = $nursary->stocks();
            return DataTables::of($model)
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
        return view('pages.stock.create')->withData($nursary);
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
        // dd($stock);
        return view('pages.stock.edit')->withData($stock);
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
