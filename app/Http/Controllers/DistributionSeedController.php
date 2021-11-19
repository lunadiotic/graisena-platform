<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distribution;
use App\DistributionSeed;
use App\Seed;
use Yajra\DataTables\Facades\DataTables;

class DistributionSeedController extends Controller
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

    public function index(Request $request, Distribution $distribution)
    {
        if ($request->ajax()) {
            $model = $distribution->distribution_seeds();
            return DataTables::of($model)
                ->addColumn('seed', function ($model) {
                    return $model->seed->title;
                })
                ->addColumn('action', function ($model) {
                    return view('layouts.partials._action', [
                        'model' => $model,
                        'url_show' => ('#'),
                        'url_edit' => route('distribution.seed.edit', $model->id),
                        'url_destroy' => route('distribution.seed.destroy', $model->id)
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }

        return view('pages.distributionseed.index')->withData($distribution);
    }

    public function create(Distribution $distribution)
    {
        $data = [
            'distribution' => $distribution,
            'seed' => Seed::all(),
        ];
        return view('pages.distributionseed.create')->with($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'seed_id' => ['required', 'numeric'],
            'total' => ['required', 'numeric']
        ]);
        DistributionSeed::create($request->all());
        return redirect()->route('distribution.seed.index', ['distribution' => $request->distribution_id]);
    }

    public function show(Distribution $distribution)
    {
        return view('pages.distributionseed.show')->withData($distribution);
    }

    public function edit(DistributionSeed $distribution_seed)
    {
        $data = [
            'distribution' => $distribution_seed,
            'seed' => Seed::all(),
        ];
        return view('pages.distributionseed.edit')->with($data);
    }

    public function update(DistributionSeed $distribution_seed, Request $request)
    {
        $this->validate($request, [
            'seed_id' => ['required', 'numeric'],
            'total' => ['required', 'numeric']
        ]);
        $distribution_seed->update($request->all());
        return redirect()->route('distribution.seed.index', ['distribution' => $request->distribution_id]);
    }

    public function destroy(DistributionSeed $distribution_seed)
    {
        $distribution_seed->delete();
        return redirect()->route('distribution.seed.index', ['distribution' => $distribution_seed->distribution_id]);
    }
}
