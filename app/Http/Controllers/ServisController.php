<?php

namespace App\Http\Controllers;

use App\Models\Servis;
use Illuminate\Http\Request;

class ServisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('servis.index', ["servis" => Servis::all()]);
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
            'namaservis' => 'required|max:25|unique:servis,namaservis'
        ],[
            'required' => 'field tidak boleh kosong',
            'max' => 'data tidak boleh lebih dari :max karakter',
            'unique' => 'data servis sudah terdaftar, masukkan data dengan nama lain',
        ]);
        Servis::create($validatedData);
        
        return redirect('/servis')->with('input', 'Data berhasil ditambah');
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
        return view('servis.edit', ['servis' => Servis::find(base64_decode($id))]);
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
            'namaservis' => 'required|max:25|unique:servis,namaservis'
        ],[
            'required' => 'field tidak boleh kosong',
            'max' => 'data tidak boleh lebih dari :max karakter',
            'unique' => 'data servis sudah terdaftar, masukkan data dengan nama lain',
        ]);
        Servis::find(base64_decode($id))->update($request->all());
        return redirect('/servis')->with('update', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Servis::destroy($id);
        return redirect('/servis')->with('delete', 'Data berhasil dihapus');
    }
}
