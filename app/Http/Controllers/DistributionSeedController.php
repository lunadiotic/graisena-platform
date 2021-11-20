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

    public function index(Request $request, $id)
    {
        if ($request->ajax()) {
            $model = DistributionSeed::where('distribution_id', $id)
            ->with('distribution');
            return DataTables::of($model)
                ->addColumn('seed', function ($model) {
                    return $model->seed->title;
                })
                ->addColumn('action', function ($model) {
                    return view('layouts.partials._action', [
                        'model' => $model,
                        'url_show' => ('#'),
                        'url_edit' => route('dist.seed.edit', [$model->distribution->id, $model->id]),
                        'url_destroy' => route('dist.seed.destroy', [$model->distribution->id, $model->id])
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }
        $distribution = Distribution::findOrFail($id);
        return view('pages.distributionseed.index')->withData($distribution);
    }

    public function create($id)
    {
        $distribution = Distribution::findOrFail($id);
        $data = [
            'distribution' => $distribution,
            'seed' => Seed::all(),
        ];
        return view('pages.distributionseed.create')->with($data);
    }

    public function store($id, Request $request)
    {
        $distribution = Distribution::findOrFail($id);
        $this->validate($request, [
            'seed_id' => ['required', 'numeric'],
            'total' => ['required', 'numeric']
        ]);
        $distribution->distribution_seeds()->create($request->all());
        return redirect()->route('dist.seed.index', $distribution->id);
    }

    public function show($id, $seed)
    {
        $distribution = Distribution::findOrFail($id);
        $data = $distribution->distribution_seeds()->where('id', $seed)->first();
        return view('pages.distributionseed.show')->withData($data);
    }

    public function edit($id, $seed)
    {
        $distribution = Distribution::findOrFail($id);
        $data = [
            'distribution' => $distribution,
            'distribution_seed' => $distribution->distribution_seeds()->where('id', $seed)->first(),
            'seed' => Seed::all(),
        ];
        return view('pages.distributionseed.edit')->with($data);
    }

    public function update(Request $request, $id, $seed)
    {
        $distribution = Distribution::findOrFail($id);
        $this->validate($request, [
            'seed_id' => ['required', 'numeric'],
            'total' => ['required', 'numeric']
        ]);
        $distribution->distribution_seeds()->find($seed)->update($request->except(['_method', '_token']));
        return redirect()->route('dist.seed.index', $distribution->id);
    }

    public function destroy($id, $seed)
    {
        $distribution = Distribution::findOrFail($id);
        $distribution->distribution_seeds()->find($seed)->delete();
        return redirect()->route('dist.seed.index', $distribution->id);
    }
}
