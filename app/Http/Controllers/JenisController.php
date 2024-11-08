<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jenis.index', ["jenis" => Jenis::all()]);
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
            'namajenis' => 'required|max:25',
            'keterangan' => 'max:50',
        ],[
            'required' => 'field tidak boleh kosong',
            'max' => 'data tidak boleh lebih dari :max karakter',
        ]);
        Jenis::create($validatedData);
        return redirect('/jenis')->with('input', 'Data berhasil ditambah');
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
        return view('jenis.edit', ['jenis' => Jenis::find(base64_decode($id))]);
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
            'namajenis' => 'required|max:25',
            'keterangan' => 'max:50'
        ],[
            'required' => 'field tidak boleh kosong',
            'max' => 'data tidak boleh lebih dari :max karakter',
        ]);

        Jenis::find(base64_decode($id))->update($validatedData);
        return redirect('/jenis')->with('update','Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jenis::destroy($id);
        return redirect('/jenis')->with('delete','Data berhasil dihapus');
    }
}
