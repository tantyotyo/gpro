<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Rute;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rute.index', [
            "rute" => Rute::all(),
            "kota" => Kota::all(),
            "kota2" => Kota::all(),
        ]);
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
            'namarute' => 'required|max:25',
            'portofloading' => 'required',
            'portofdischarge' => 'required',
            'keterangan' => 'max:50',
        ],[
            'namarute.required' => 'field tidak boleh kosong',
            'portofloading.required' => 'silahkan pilih port of loading',
            'portofdischarge.required' => 'silahkan pilih port of discharge',
            'max' => 'data tidak boleh lebih dari :max karakter',
        ]);
        Rute::create($validatedData);
        return redirect('/rute')->with('input', 'Data berhasil ditambah');
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

        return view('rute.edit',[
            'rute' => Rute::find(base64_decode($id)),
            'kota' => Kota::all(),
            'kota2' => Kota::all(),
        ]);
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
            'namarute' => 'required|max:25',
            'portofloading' => 'required',
            'portofdischarge' => 'required',
            'keterangan' => 'max:50',
        ],[
            'required' => 'field tidak boleh kosong',
            'portofloading.required' => 'silahkan pilih port of loading',
            'portofdischarge.required' => 'silahkan pilih port of discharge',
            'max' => 'data tidak boleh lebih dari :max karakter',
        ]);

        Rute::find(base64_decode($id))->update($validatedData);
        return redirect('/rute')->with('update','Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rute::destroy($id);
        return redirect('/rute')->with('delete', 'Data berhasil dihapus');
    }
}
