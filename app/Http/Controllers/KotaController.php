<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kota.index', ["kota" => Kota::all(),]);
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
            'namakota' => 'required|max:25|unique:kota,namakota'
        ],[
            'required' => 'field tidak boleh kosong',
            'max' => 'data tidak boleh lebih dari :max karakter',
            'unique' => 'data kota sudah terdaftar, masukkan data dengan nama lain',
        ]);
        Kota::create($validatedData);
        return redirect('/kota')->with('input', 'Data berhasil ditambah');
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
        return view('kota.edit', ['kota' => Kota::find(base64_decode($id))]);
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
            'namakota' => 'required|max:25|unique:kota,namakota',
        ],[
            'required' => 'field tidak boleh kosong',
            'max' => 'data tidak boleh lebih dari :max karakter',
            'unique' => 'data kota sudah terdaftar, masukkan data dengan nama lain',
        ]);

        Kota::find(base64_decode($id))->update($validatedData);
        return redirect('/kota')->with('update','Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kota::destroy($id);
        return redirect('/kota')->with('delete','Data berhasil dihapus');
    }
}
