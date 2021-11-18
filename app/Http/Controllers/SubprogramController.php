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
                ->addColumn('action', function ($model){
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
        $program = Program::findOrFail($id);
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
        $program = Program::findOrFail($id);
        $data = $program->subprogram()->where('id', $subprogram)->first();
        return view('pages.subprogram.show')->withData($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $subprogram)
    {
        $program = Program::findOrFail($id);
        $data = $program->subprogram()->where('id', $subprogram)->first();
        return view('pages.subprogram.edit')->with([
            'program' => $program,
            'data' => $data
        ]);
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
        $program = Program::findOrFail($id);
        $program->subprogram()->update($request->except(['_method', '_token']));
        return redirect()->route('subprogram.index', $program->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->subprogram()->delete();
        return redirect()->route('subprogram.index', $program->id);
    }
}
