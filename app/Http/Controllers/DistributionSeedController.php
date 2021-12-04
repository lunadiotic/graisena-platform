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
                        'url_show' => route('dist.seed.show', [$model->distribution->id, $model->id]),
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
        $this->checkGuest();

        $distribution = Distribution::findOrFail($id);
        $seed = Seed::all();
        $data = [
            'distribution' => $distribution,
            'seed' => $seed,
        ];
        return view('pages.distributionseed.create')->with($data);
    }

    public function store($id, Request $request)
    {
        $this->checkGuest();

        $distribution = Distribution::findOrFail($id);
        $this->validate($request, [
            'seed_id' => ['required', 'numeric'],
            'total' => ['required', 'numeric']
        ]);
        $request['user_id'] = auth()->user()->id;
        $distribution->distribution_seeds()->create($request->all());
        return redirect()->route('dist.seed.index', $distribution->id);
    }

    public function show($id, $seed)
    {
        $data = [
            'distribution' => $distribution = Distribution::findOrFail($id),
            'data' => $distribution->distribution_seeds()->where('id', $seed)->first()
        ];
        return view('pages.distributionseed.show')->with($data);
    }

    public function edit($id, $seed)
    {
        $this->checkGuest();

        $distribution = Distribution::findOrFail($id);
        $distributionSeed = $distribution->distribution_seeds()->find($seed);
        if (auth()->user()->can('edit', $distributionSeed)) {
            $data = [
                'distribution' => $distribution,
                'distribution_seed' => $distributionSeed,
                'seed' => Seed::all(),
            ];
            return view('pages.distributionseed.edit')->with($data);
        }
        return redirect()->back();
    }

    public function update(Request $request, $id, $seed)
    {
        $this->checkGuest();

        $distribution = Distribution::findOrFail($id);
        $this->validate($request, [
            'seed_id' => ['required', 'numeric'],
            'total' => ['required', 'numeric']
        ]);
        $distributionSeed = $distribution->distribution_seeds()->find($seed);
        if (auth()->user()->can('update', $distributionSeed)) {
            $distributionSeed->update($request->except(['_method', '_token']));
            return redirect()->route('dist.seed.index', $distribution->id);
        }
        return redirect()->back();
    }

    public function destroy($id, $seed)
    {
        $this->checkGuest();
        
        $distribution = Distribution::findOrFail($id);
        $distributionSeed = $distribution->distribution_seeds()->find($seed);
        if (auth()->user()->can('delete', $distributionSeed)) {
            $distributionSeed->delete();
            return redirect()->route('stock.index', $distribution->id);
        }
        return redirect()->back();
    }
}
