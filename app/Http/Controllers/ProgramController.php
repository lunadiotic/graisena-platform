<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProgramController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Program::query();
            return DataTables::of($model)
                ->addColumn('add', function ($model) {
                    return view('layouts.partials._add', [
                        'route' => route('subprogram.index', $model->id)
                    ]);
                })
                ->addColumn('action', function ($model) {
                    return view('layouts.partials._action', [
                        'model' => $model,
                        'url_show' => route('program.show', $model->id),
                        'url_edit' => route('program.edit', $model->id),
                        'url_destroy' => route('program.destroy', $model->id)
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }

        return view('pages.program.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->can('create', Program::class)) {
            return view('pages.program.create');
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
            'description' => ['required', 'string'],
        ]);

        auth()->user()->programs()->create($request->all());

        return redirect()->route('program.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Program::findOrFail($id);
        return view('pages.program.show')->withData($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Program::findOrFail($id);
        if (auth()->user()->can('edit', $data)) {
            return view('pages.program.edit')->withData($data);
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Program::findOrFail($id);
        if (auth()->user()->can('update', $data)) {

            $this->validate($request, [
                'title' => ['required', 'string'],
                'description' => ['required', 'string'],
            ]);

            $data->update($request->all());
            return redirect()->route('program.index');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Program::findOrFail($id);
        if (auth()->user()->can('delete', $data)) {
            $data->delete();
            return redirect()->route('program.index');
        }
        return redirect()->back();
    }
}
