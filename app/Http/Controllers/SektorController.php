<?php

namespace App\Http\Controllers;

use App\Models\Sektor;
use Illuminate\Http\Request;

class SektorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sektor.index', ["sektor" => Sektor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namasektor' => 'required|max:25|unique:sektor,namasektor',
            'keterangan' => 'required|max:50',
        ],[
            'required' => 'field tidak boleh kosong',
            'max' => 'data tidak boleh lebih dari :max karakter',
            'unique' => 'data sektor sudah terdaftar, masukkan data dengan nama lain',
        ]);

        Sektor::create($validatedData);
        return redirect('/sektor')->with('input', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('sektor.edit',['sektor' => Sektor::find(base64_decode($id))]);
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
        $validatedData = $request->validate([
            'namasektor' => 'required|max:25',
            'keterangan' => 'required|max:50',
        ],[
            'required' => 'field tidak boleh kosong',
            'max' => 'data tidak boleh lebih dari :max karakter',
        ]);

        Sektor::find(base64_decode($id))->update($validatedData);
        return redirect('/sektor')->with('update','Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sektor::destroy($id);
        return redirect('/sektor')->with('delete', 'Data berhasil dihapus');
    }
}
