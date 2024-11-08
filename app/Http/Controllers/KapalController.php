<?php

namespace App\Http\Controllers;

use App\Models\Kapal;
use App\Models\Pelayaran;
use Illuminate\Http\Request;

class KapalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kapal.index', [
            "kapal" => Kapal::with('pelayaran')->get(),
            "pelayaran" => Pelayaran::all(),
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
            'namakapal' => 'required|max:25',
            'idpelayaran' => 'required',
            'tahunpembuatan' => 'required|digits_between:1,4|gte:1500',
        ],[
            'idpelayaran.required' => 'silahkan pilih pelayarannya',
            'required' => 'field tidak boleh kosong',
            'digits_between' => 'data tidak boleh kurang dari :min dan tidak boleh lebih dari :max digit',
            'gte' => 'data harus lebih dari tahun :value',
        ]);
        Kapal::create([
            'fk_idpelayaran' => $validatedData['idpelayaran'],
            'namakapal' => $validatedData['namakapal'],
            'tahunpembuatan' => $validatedData['tahunpembuatan'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/kapal')->with('input','Data berhasil ditambah');
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
        return view('kapal.edit', [
            "kapal" => Kapal::find(base64_decode($id)),
            "pelayaran" => Pelayaran::all(),
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
            'namakapal' => 'required|max:25',
            'idpelayaran' => 'required',
            'tahunpembuatan' => 'required|digits_between:1,4|gte:1500',
        ],
        $messages = array(
            'idpelayaran.required' => 'silahkan pilih pelayarannya',
            'required' => 'field tidak boleh kosong',
            'digits_between' => 'data tidak boleh kurang dari :min dan tidak boleh lebih dari :max digit',
            'gte' => 'data harus lebih dari tahun :value',
        ));
        Kapal::find(base64_decode($id))->update($validatedData);
        return redirect('/kapal')->with('update','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kapal::destroy($id);
        return redirect('/kapal')->with('delete','Data berhasil dihapus');
    }
}
