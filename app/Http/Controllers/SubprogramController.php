<?php

namespace App\Http\Controllers;

use App\Program;
use App\Subprogram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class SubprogramController extends Controller
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
    public function index($id, Request $request)
    {
        if ($request->ajax()) {
            $model = Subprogram::where('program_id', $id)
                ->orderBy('date_start', 'DESC')->with(['program']);
            return DataTables::of($model)
                ->addColumn('action', function ($model) {
                    return view('layouts.partials._action', [
                        'model' => $model,
                        'url_show' => route('subprogram.show', [$model->program->id, $model->id]),
                        'url_edit' => route('subprogram.edit', [$model->program->id, $model->id]),
                        'url_destroy' => route('subprogram.destroy', [$model->program->id, $model->id])
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }
        $program = Program::findOrFail($id);
        return view('pages.subprogram.index')->with([
            'program' => $program
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $this->checkGuest();
        $program = Program::findOrFail($id);
        return view('pages.subprogram.create')->with([
            'program' => $program
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $this->checkGuest();
        $program = Program::findOrFail($id);
        $this->validate($request, [
            'date_start' => ['required'],
            'date_end' => ['required'],
            'location' => ['required'],
            'partner' => ['nullable', 'string'],
            'notes' => ['nullable', 'string'],
            'budget' => ['nullable', 'numeric'],
            'used' => ['nullable', 'numeric'],
            'balance' => ['nullable', 'numeric'],
            'total_male' => ['required', 'numeric'],
            'total_female' => ['required', 'numeric'],
            'range_age_1' => ['nullable', 'numeric'],
            'range_age_2' => ['nullable', 'numeric'],
            'range_age_3' => ['nullable', 'numeric'],
            'range_age_4' => ['nullable', 'numeric'],
            'range_age_5' => ['nullable', 'numeric'],
            'range_age_6' => ['nullable', 'numeric'],
            'attachment' => ['nullable', 'string'],
        ]);
        $request['user_id'] = auth()->user()->id;
        $program->subprogram()->create($request->all());
        return redirect()->route('subprogram.index', $program->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $subprogram)
    {
        $data = [
            'program' => $program = Program::findOrFail($id),
            'data' => $program->subprogram()->where('id', $subprogram)->first()
        ];
        return view('pages.subprogram.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $subprogram)
    {
        $this->checkGuest();
        $program = Program::findOrFail($id);
        $data = $program->subprogram()->where('id', $subprogram)->first();
        if (auth()->user()->can('edit', $data)) {
            return view('pages.subprogram.edit')->with([
                'program' => $program,
                'data' => $data
            ]);
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
    public function update(Request $request, $id, $subprogram)
    {
        $this->checkGuest();
        $program = Program::findOrFail($id);
        $this->validate($request, [
            'date_start' => ['required'],
            'date_end' => ['required'],
            'location' => ['required'],
            'partner' => ['nullable', 'string'],
            'notes' => ['nullable', 'string'],
            'budget' => ['nullable', 'numeric'],
            'used' => ['nullable', 'numeric'],
            'balance' => ['nullable', 'numeric'],
            'total_male' => ['required', 'numeric'],
            'total_female' => ['required', 'numeric'],
            'range_age_1' => ['nullable', 'numeric'],
            'range_age_2' => ['nullable', 'numeric'],
            'range_age_3' => ['nullable', 'numeric'],
            'range_age_4' => ['nullable', 'numeric'],
            'range_age_5' => ['nullable', 'numeric'],
            'range_age_6' => ['nullable', 'numeric'],
            'attachment' => ['nullable', 'string'],
        ]);
        $subProgram = $program->subprogram()->find($subprogram);
        if (auth()->user()->can('update', $subProgram)) {
            $subProgram->update($request->except(['_method', '_token']));
            return redirect()->route('subprogram.index', $program->id);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $subprogram)
    {
        $this->checkGuest();
        $program = Program::findOrFail($id);
        $subProgram = $program->subprogram()->find($subprogram);
        if (auth()->user()->can('delete', $subProgram)) {
            $subProgram->delete();
            return redirect()->route('subprogram.index', $program->id);
        }
        return redirect()->back();
    }
}
