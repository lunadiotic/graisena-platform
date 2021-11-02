<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Program::orderBy('date', 'DESC');
            return DataTables::of($model)
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
        return view('pages.program.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = now()->timestamp . '-' . 'attc-' . Str::slug($request->title) . '.' . $fileExtension;
            Storage::disk('local')->putFileAs('program', $file, $fileName);
            $request->merge(['attachment' => $fileName]);
        }

        Program::create($request->except('file_upload'));
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
        return view('pages.program.edit')->withData($data);
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
        if($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = now()->timestamp . '-' . 'attc-' . Str::slug($request->title) . '.' . $fileExtension;
            Storage::disk('local')->putFileAs('program', $file, $fileName);
            $request->merge(['attachment' => $fileName]);
            if ($data->attachment) {
                Storage::disk('local')->delete('program/' . $data->attachment);
            }
        }
        $data->update($request->except('file_upload'));
        return redirect()->route('program.index');
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
        if ($data->attachment) {
            Storage::disk('local')->delete('program/' . $data->attachment);
        }
        $data->delete();
        return redirect()->route('program.index');
    }
}
