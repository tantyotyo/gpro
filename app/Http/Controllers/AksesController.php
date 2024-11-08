<?php

namespace App\Http\Controllers;

use App\Models\Akses;
use Illuminate\Http\Request;

class AksesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('akses.index', ["akses" => Akses::all()]);
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
     * @param  \App\Http\Requests\StoreAksesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaakses' => 'required|max:25|unique:akses,namaakses',
        ],[
            'required' => 'field tidak boleh kosong',
            'max' => 'data tidak boleh lebih dari :max karakter',
            'unique' => 'data akses sudah terdaftar, masukkan data dengan nama lain',
        ]);
        Akses::create($validatedData);
        return redirect('/akses')->with('input', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Akses  $akses
     * @return \Illuminate\Http\Response
     */
    public function show(Akses $akses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Akses  $akses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('akses.edit',['akses' => Akses::find(base64_decode($id))]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAksesRequest  $request
     * @param  \App\Models\Akses  $akses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'namaakses' => 'required|max:25|unique:akses,namaakses',
        ],[
            'required' => 'field tidak boleh kosong',
            'max' => 'data tidak boleh lebih dari :max karakter',
            'unique' => 'data akses sudah terdaftar, masukkan data dengan nama lain',
        ]);

        Akses::find(base64_decode($id))->update($validatedData);
        return redirect('/akses')->with('update','Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Akses  $akses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Akses::destroy($id);
        return redirect('/akses')->with('delete','Data berhasil dihapus');
    }
}
